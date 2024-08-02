export class Order {

    static data = [];

    constructor(orderData) {
        Order.data = {
            'id': orderData['id'],
            'user': orderData['user'],
            'phone': orderData['phone'],
            'email': orderData['email'],
            'address': orderData['address'],
            'payment': orderData['payment'],
        };
    }

    static displayOrderId(id) {
        const numOr = document.querySelector('.orderSuccess span');
        if (numOr) {
            numOr.dataset.numOrder = id;
            numOr.textContent = id;
        }
    }

    static displayOrder() {
        const data = Order.data;

        const totalOrder = document.querySelector('.totalOrder');
        if (totalOrder) {
            const clientInfoHtml = `
                <div>
                    <p>Телефон: ${data.phone}</p>
                    <p>Email: ${data.email}</p>
                    <p>Адрес: ${data.address}</p>
                    <p>Способ оплаты: ${data.payment}</p>
                </div>
            `;

            const orderIdHtml = `<p>Номер заказа: ${data.id}</p>`;
            totalOrder.innerHTML = clientInfoHtml + orderIdHtml;
        }
    }

    static makeOrder(orderForm) {
        const data = Order.data;
        const makeOrderButton = orderForm.querySelector('.makeOrder');
        if (makeOrderButton) {
            makeOrderButton.onclick = function () {
                Order.displayOrderId(data.id);
                window.location.href = 'orderSuccess.php';
            };
        }
    }
}
