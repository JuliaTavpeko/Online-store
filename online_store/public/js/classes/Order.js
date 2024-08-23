
export class Order {

    static data = [];

    constructor(orderData) {
        Order.data = { ...orderData };
    }

    static displayOrderId(orderId) {
        const numOr = document.querySelector('.orderSuccess span');
        if (numOr) {
            numOr.dataset.numOrder = orderId;
            numOr.textContent = orderId;
        }
    }

    static displayOrder(order) {
        const totalOrder = document.querySelector('.totalOrder');
        if (totalOrder && order.id) {
            totalOrder.innerHTML = `
                <div>
                    <p>Номер заказа: ${order.id}</p>
                    <p>Стоимость: ${order.totalPrice}</p>
                    <p>Телефон: ${order.phone}</p>
                    <p>Email: ${order.email}</p>
                    <p>Адрес: ${order.address}</p>
                    <p>Способ оплаты: ${order.payment}</p>
                </div>
            `;
        }
    }
}
