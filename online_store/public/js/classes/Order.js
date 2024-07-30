import {Common} from "./Common.js";

export class Order {

    constructor(order) {
        for (let key in order) {
            this[key] = order[key];
        }
    }

    static getCurrentUser() {
        return JSON.parse(sessionStorage.getItem('currentUser'));
    }

    static getOrderId() {
        return Common.getRandomInt(1, 10000);
    }

    static getBasketKey(userId) {
        return `basket_${userId}`;
    }

    static getBasketOrder(basketKey) {
        return JSON.parse(localStorage.getItem(basketKey));
    }

    static saveToLocalStorage(order) {
        const currentUser = Order.getCurrentUser();
        const client = JSON.parse(localStorage.getItem('client')) || [];
        client.push({order});

        const basketKey = Order.getBasketKey(currentUser.userId);
        const basketOrder = Order.getBasketOrder(basketKey);

        const orderId = Order.getOrderId();
        const dataOr = {basketOrder: basketOrder, client: client, orderId: orderId, userId: currentUser.userId};

        localStorage.setItem(orderId, JSON.stringify(dataOr));
        localStorage.setItem('currentOrderId', orderId);
    }

    static displayOrderId(orderId) {
        const numOr = document.querySelector('.orderSuccess span');
        if (numOr) {
            numOr.dataset.numOrder = orderId;
            numOr.textContent = orderId;
        }
    }
    static deleteFromLocalStorage() {
        const currentUser = Order.getCurrentUser();
        const basketKey = Order.getBasketKey(currentUser.userId);
        const basket = Order.getBasketOrder(basketKey);

        if (basket && basket.userBasket) {
            basket.userBasket = [];
            localStorage.setItem(basketKey, JSON.stringify(basket));
        }
    }

    static displayOrder() {
        const currentOrderId = localStorage.getItem('currentOrderId');
        const dataOr = JSON.parse(localStorage.getItem(currentOrderId));
        if (dataOr && Order.getCurrentUser() && Order.getCurrentUser().userId === dataOr.userId) {
            const totalOrder = document.querySelector('.totalOrder');
            if (totalOrder) {
                const clientInfoHtml = `
                    <div>
                        <p>Телефон: ${dataOr.client[0].order.phoneClient}</p>
                        <p>Email: ${dataOr.client[0].order.emailClient}</p>
                        <p>Адрес: ${dataOr.client[0].order.adressClient}</p>
                        <p>Способ оплаты: ${dataOr.client[0].order.payment}</p>
                    </div>
                `;

                const orderIdHtml = `<p>Номер заказа: ${dataOr.orderId}</p>`;
                totalOrder.innerHTML = clientInfoHtml + orderIdHtml;
            }
        }
    }

    static makeOrder(orderForm) {
        const makeOrderButton = orderForm.querySelector('.makeOrder');
        if (makeOrderButton) {
            makeOrderButton.onclick = function () {
                const orderId = Order.getOrderId();
                localStorage.setItem('currentOrderId', orderId);
                Order.displayOrderId(orderId);
                window.location.href = 'orderSuccess.php';
                Order.deleteFromLocalStorage();
            };
        }
    }
}
