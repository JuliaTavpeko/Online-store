import {Order} from "../classes/Order.js";

document.addEventListener('DOMContentLoaded', function() {

    const urlParams = new URLSearchParams(window.location.search);
    const orderId = urlParams.get('order');

    if (orderId) {
        Order.data.id = orderId;
        Order.displayOrderId(orderId);
    }

});
