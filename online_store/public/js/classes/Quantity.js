export class Quantity {
    static currentQuantity = 0;

    static setQuantity(newQuantity) {
        Quantity.currentQuantity = newQuantity;
    }

    static getQuantity() {
        console.log('Quantity.currentQuantity:', Quantity.currentQuantity);
        return Quantity.currentQuantity;
    }

    static addQuantityHandlers() {
        document.addEventListener('click', (event) => {
            const button = event.target.closest('.plus-btn, .minus-btn');
            if (button) {
                const product = button.closest('.basket_item');
                const quantityInput = product.querySelector('.input_price');
                const productId = product.dataset.id;

                if (button.classList.contains('plus-btn')) {
                    quantityInput.value++;
                } else if (button.classList.contains('minus-btn')) {
                    quantityInput.value = quantityInput.value > 1 ? quantityInput.value - 1 : quantityInput.value;
                }

                Quantity.setQuantity(quantityInput.value);
                const newQuantity = Quantity.getQuantity();

                fetch('/updateBasket', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ idProd: productId, idUser: "55", quantity: newQuantity })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const priceElement = product.querySelector('.prodPrice');
                            const subtotalElement = product.querySelector('.subtotal .price');
                            const price = parseFloat(priceElement.textContent);
                            subtotalElement.textContent = `${(price * newQuantity).toFixed(2)} руб.`;
                        } else {
                            console.error('Ошибка при обновлении количества товара');
                        }
                    })
                    .catch(error => console.error('Ошибка при отправке запроса на сервер:', error));
            }
        });
    }
}
