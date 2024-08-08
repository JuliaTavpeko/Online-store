import {Order} from '../classes/Order.js';
import {RequestManager} from "../classes/RequestManager.js";
import {Basket} from "../classes/Basket.js";
import {Authorization} from "../classes/Authorization.js";

IMask(
    document.querySelector('[name="phoneClient"]'),
    {
        mask: '+{375}(00)000-00-00',
        lazy: false
    }
)

IMask(
    document.querySelector('[name="emailClient"]'),
    {
        mask: 'w@w.w',
        blocks: {
            w: { mask: /\w*/g }
        },
        lazy: false
    }
)

document.addEventListener('DOMContentLoaded', function() {
     const orderForm = document.querySelector('.order');
     const openFormBtn = document.getElementById("openFormButton");

     openFormBtn.addEventListener('click', function (e){
         e.preventDefault();
         orderForm.classList.add('active');
         document.body.style.overflow = "";
     });

    const sessionData = Authorization.getSessionData();
    let userId;
    if(sessionData.id){
        userId = sessionData.id;
    }

    Basket.displayProduct();

    orderForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const dataOr = orderForm.querySelectorAll('.orderInfo');
        const orderData = {};

        dataOr.forEach(element => {
            if (element.id === 'payment') {
                const selectedPaymentMethod = element.querySelector('input[name="paymentMethod"]:checked');
                if (selectedPaymentMethod) {
                    orderData['payment'] = selectedPaymentMethod.value;
                }
            } else {
                orderData[element.id] = element.value;
            }
        });

        orderData['idUser'] = userId;
        orderData['user'] = sessionData.login;

        console.log('orderData:',orderData);

        RequestManager.sendRequest('/order','POST', orderData)
            .then(result => {
                console.log('Результат запроса order:', result);
                new Order(result);
                Order.makeOrder(orderForm);
                Order.displayOrder();

            });
    })

});