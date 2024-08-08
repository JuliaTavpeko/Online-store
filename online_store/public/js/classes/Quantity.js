import {Authorization} from "./Authorization.js";
import {Catalog} from "./Catalog.js";
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
                    quantity: Quantity.getQuantity(),
                    price: Catalog.getProductData().price
                };

                const subtotalElement = product.querySelector('.subtotal .price');

                RequestManager.sendRequest('/updateBasket','POST', quantityData)
                    .then(result => {
                        console.log('Результат запроса updateBasket:', result);
                        if(subtotalElement){
                            subtotalElement.textContent = `${result.itemPrice} руб.`;

                        }
                    });
            }
        });
    }
}
