import {Order} from "../classes/Order.js";

document.addEventListener('DOMContentLoaded', function() {

    const orderData = Order.getOrderId();
    console.log(orderData);
    Order.displayOrderId(orderData);

});