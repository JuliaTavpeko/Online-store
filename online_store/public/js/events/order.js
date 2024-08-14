import {RequestManager} from "../classes/RequestManager.js";
import {Basket} from "../classes/Basket.js";
import {Authorization} from "../classes/Authorization.js";
import {Quantity} from "../classes/Quantity.js";
import {Order} from '../classes/Order.js';

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

    const prodContainer = document.querySelector('.product-container');
    if(prodContainer){
        const prodData = JSON.parse(prodContainer.getAttribute('data-prod'));

        const basketArray = {
            idUser: Authorization.getSessionData().id,
            idProd: prodData['id'],
            nameProd: prodData['name'],
            quantity: Quantity.getQuantity(),
            price: prodData['price'],
        };

        if(basketArray) {
            RequestManager.sendRequest('/getBasket', 'POST', basketArray)
                .then(result => {
                    console.log('Результат запроса getBasket:', result);
                    Basket.displayProduct(result);
                });
        }
    }

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

        orderData['idUser'] = Authorization.getSessionData().id;
        orderData['user'] = Authorization.getSessionData().login;

        RequestManager.sendRequest('/order','POST', orderData)
            .then(result => {
                console.log('Результат запроса order:', result);
                new Order(result);
                Order.makeOrder(orderForm);
                Order.displayOrder();
                //Basket.deleteProduct(orderData['idUser']);
            });
    })
});