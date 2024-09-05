import {RequestManager} from "../classes/RequestManager.js";
import {Basket} from "../classes/Basket.js";
import {Authorization} from "../classes/Authorization.js";
import {Quantity} from "../classes/Quantity.js";
import {Order} from '../classes/Order.js';
import {EventHandler} from "../classes/EventHandler.js";

document.addEventListener('DOMContentLoaded', function() {

    const phoneElement = document.querySelector('[name="phoneClient"]');
    if (phoneElement) {
        IMask(
            phoneElement,
            {
                mask: '+{375}(00)000-00-00',
                lazy: false
            }
        );
    }

    const emailElement = document.querySelector('[name="emailClient"]');
    if (emailElement) {
        IMask(
            emailElement,
            {
                mask: 'w@w.w',
                blocks: {
                    w: { mask: /\w*/g }
                },
                lazy: false
            }
        );
    }

    const orderForm = document.querySelector('.order');
    const openFormBtn = document.querySelector('.orderFormBtn');

    if(orderForm && openFormBtn) {
        openFormBtn.addEventListener('click', function (e) {
            e.preventDefault();
            orderForm.classList.add('active');
            document.body.style.overflow = "";
        });

        const basketArray = {
            idUser: Authorization.getSessionData().id,
        };

        let totalPrice = 0;

        if(basketArray) {
            RequestManager.sendRequest('/getBasket', 'POST', basketArray)
                .then(result => {
                    console.log('Результат запроса getBasket:', result);
                    if(result) {
                        totalPrice = result.totalPrice;

                        const items = Object.keys(result)
                            .filter(key => key !== 'totalPrice')
                            .map(key => result[key]);

                        Basket.displayProduct(items, totalPrice);
                        items.forEach(item => {
                            new Quantity(item);
                        });
                    }
                });
        }

        const dataOr = orderForm.querySelectorAll('.orderInfo');
        const orderData = {};

        orderForm.addEventListener('submit', function (e) {
            e.preventDefault();

            console.log('basketArray', basketArray);

            RequestManager.sendRequest('/basket', 'POST', basketArray)
                .then(result => {
                    console.log('Результат запроса basket:', result);
                });

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
            orderData['totalPrice'] = totalPrice;

            RequestManager.sendRequest('/order','POST', orderData)
                .then(result => {
                    console.log('Результат запроса order:', result);
                    if(result !== false) {
                        new Order(result);
                        window.location.href = `orderSuccess.php?order=${result.id}`;
                    }
                });

            const basketItemsContainer = document.getElementById('basket-items');
            EventHandler.addDeleteBasketFromDBHandlers(basketItemsContainer);
        });
    }

    if (Authorization.getSessionData().id) {
        RequestManager.sendRequest('/getOrder', 'POST', Authorization.getSessionData().id)
            .then(result => {
                console.log('Результат запроса getOrder:', result);
                if (result !== false) {
                    Order.displayOrder(result);
                }
            });
    }

    Quantity.addQuantityHandlers();
});
