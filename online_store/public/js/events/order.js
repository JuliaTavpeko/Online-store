import {Order} from '../classes/Order.js';

IMask(
    document.getElementById('phoneClient'),
    {
        mask: '+{375}(00)000-00-00',
        lazy: false
    }
)

IMask(
    document.getElementById('emailClient'),
    {
        mask: 'w@w.w',
        blocks: {
            w: { mask: /\w*/g }
        },
        lazy: false
    }
)

document.addEventListener('DOMContentLoaded', function() {
    const orderForm = document.querySelector('.orders');
    const openFormBtn = document.getElementById("openFormButton");

    const currentUser = Order.getCurrentUser();
    if (currentUser) {
        const basketKey = Order.getBasketKey(currentUser.userId);
        const basketOrder = Order.getBasketOrder(basketKey);

        if (!basketOrder.userBasket[0] || basketOrder.userBasket.length === 0) {
            openFormBtn.setAttribute('disabled', '');
        }
    } else {
        openFormBtn.setAttribute('disabled', '');
    }

    openFormBtn.addEventListener('click', function (e){
        e.preventDefault();
        orderForm.classList.add('active');
        document.body.style.overflow = "";
    });

    const user = JSON.parse(sessionStorage.getItem('currentUser'));

    if (user) {
        const nameClient = orderForm.querySelector('[name="nameClient"]');
        nameClient.value = user.login;
        nameClient.readOnly = true;
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

        const order = new Order(orderData);
        Order.saveToLocalStorage(order);

    })

    Order.displayOrder();
    Order.makeOrder(orderForm);

});