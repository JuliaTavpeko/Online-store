
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

    static displayOrder() {
        const totalOrder = document.querySelector('.totalOrder');
        if (totalOrder && Order.data.id) {
            totalOrder.innerHTML = `
                <div>
                    <p>Номер заказа: ${Order.data.id}</p>
                    <p>Стоимость: ${Order.data.totalPrice}</p>
                    <p>Телефон: ${Order.data.phone}</p>
                    <p>Email: ${Order.data.email}</p>
                    <p>Адрес: ${Order.data.address}</p>
                    <p>Способ оплаты: ${Order.data.payment}</p>
                </div>
            `;
        }
    }

}
