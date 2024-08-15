
export class Order {

    static data = [];

    constructor(orderData) {
        Order.data = { ...orderData };
    }

    static getOrderId(){
        return Order.data.id;
    }

    static displayOrderId(id) {
        const numOr = document.querySelector('.orderSuccess span');
        if (numOr) {
            numOr.dataset.numOrder = id;
            numOr.textContent = id;
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

    static makeOrder(orderForm) {
        const makeOrderButton = orderForm.querySelector('.makeOrder');
        makeOrderButton.addEventListener('click', function(event) {
            event.preventDefault();
            Order.displayOrderId(Order.data.id);
            window.location.href = 'orderSuccess.php';
        });
    }
}
