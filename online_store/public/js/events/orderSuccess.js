import {Order} from "../classes/Order.js";

document.addEventListener('DOMContentLoaded', function() {

    const urlParams = new URLSearchParams(window.location.search);
    const orderId = urlParams.get('order');

    if (orderId) {
        Order.data.id = orderId;
        Order.displayOrderId(orderId);
    }

    const openPopUpBasket = document.querySelector('.btn_basket');
    if(openPopUpBasket){
        openPopUpBasket.addEventListener('click', function (e) {
            e.preventDefault();
            window.location.href = `order.php`;
        });
    }
});
