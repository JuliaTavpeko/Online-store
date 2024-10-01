import {Authorization} from "../classes/Authorization.js";
import {Quantity} from "../classes/Quantity.js";
import {EventHandler} from "../classes/EventHandler.js";
import {fetchOrder, sendOrderRequest} from "./utils/orderUtils.js";
import { phoneMask, emailMask } from './utils/masks.js';

document.addEventListener('DOMContentLoaded', async function () {
    if (!window.location.pathname.includes('order')) return;

    const phoneElement = document.querySelector('[name="phoneClient"]');
    const emailElement = document.querySelector('[name="emailClient"]');

    if (phoneElement && emailElement) {
        IMask(phoneElement, phoneMask);
        IMask(emailElement, emailMask);
    }

    const orderForm = document.querySelector('.order');
    const openFormBtn = document.querySelector('.orderFormBtn');
    const idUser = Authorization.getSessionData().id;

    if (orderForm && openFormBtn) {
        openFormBtn.addEventListener('click', function (e) {
            e.preventDefault();
            orderForm.classList.add('active');
            document.body.style.overflow = "";
        });

        let totalPrice = 0;

        const dataOr = orderForm.querySelectorAll('.orderInfo');
        const orderData = {};

        orderForm.addEventListener('submit', async function (e) {
            e.preventDefault();

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

            orderData['idUser'] = idUser;
            orderData['totalPrice'] = totalPrice;

            await sendOrderRequest(orderData);
            //EventHandler.addDeleteBasketFromDBHandlers();
        });
    }

    if (idUser) {
        await fetchOrder(idUser);
    }

    await Quantity.addQuantityHandlers();
});
