import {Authorization} from "./Authorization.js";
import {RequestManager} from "./RequestManager.js";

export class Quantity {
    static currentQuantity = 0;

    static setQuantity(newQuantity) {
        Quantity.currentQuantity = newQuantity;
    }

    static getQuantity() {
        return Quantity.currentQuantity;
    }

    static addQuantityHandlers() {
        document.addEventListener('click', (event) => {

            const prodContainer = document.querySelector('.product-container');
            const prodData = JSON.parse(prodContainer.getAttribute('data-prod'));

            const button = event.target.closest('.plus-btn, .minus-btn');
            if (button) {
                const product = button.closest('.basket_item');
                const quantityInput = product.querySelector('.input_price');

                if (button.classList.contains('plus-btn')) {
                    quantityInput.value++;
                } else if (button.classList.contains('minus-btn')) {
                    quantityInput.value = quantityInput.value > 1 ? quantityInput.value - 1 : quantityInput.value;
                }

                Quantity.setQuantity(quantityInput.value);
                const quantityData = {
                    idUser: Authorization.getSessionData().id,
                    idProd: prodData['id'],
                    nameProd: prodData['name'],
                    quantity: Quantity.getQuantity(),
                    price: prodData['price'],
                    photo: prodData['photo'],
                };

                const subtotalElement = product.querySelector('.subtotal .price');

                if(quantityData && subtotalElement) {
                    RequestManager.sendRequest('/basket', 'POST', quantityData)
                        .then(result => {
                            console.log('Результат запроса updateBasket:', result);
                            if (subtotalElement) {
                                subtotalElement.textContent = `${result.itemPrice} руб.`;
                            }
                        });
                }
            }
        });
    }
}
