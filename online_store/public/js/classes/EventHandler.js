//import { Common } from "./Common.js";
import { Basket } from './Basket.js';
import {Authorization} from "./Authorization.js"

export class EventHandler {

    static addPasswordFocusHandler(form_for_auth) {
        form_for_auth.querySelector('[name="passAuth"]').addEventListener('focus', function () {
            let log_in = form_for_auth.querySelector('[name="loginAuth"]').value;
            console.log('log_in',log_in);
            console.log('Authorization.data.cookie',Authorization.data.cookie);
            console.log('Authorization.data.login',Authorization.data.login);
            console.log('Authorization.data.pass',Authorization.data.pass);

            if (Authorization.data.cookie && Authorization.data.login && Authorization.data.pass) {
                if (Authorization.data.login === log_in) {
                    form_for_auth.querySelector('[name="passAuth"]').value = Authorization.data.pass;
                }
            }

        });
    }

    static addDeleteProductFromLSHandlers(basketItemsContainer) {
        basketItemsContainer.querySelectorAll('.delete-btn').forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', () => {
                const itemId = deleteBtn.dataset.id;
                Basket.deleteProduct(itemId);
                Basket.displayProduct();
            });
        });
    }

    static addAddToBasketHandler() {
        let addBtn = document.querySelector('.btn_add_basket');

        addBtn.addEventListener('click', function(event) {
            event.preventDefault();

            if (addBtn.value !== "Перейти в корзину") {
                Basket.saveToSessionStorage();
                addBtn.value = "Перейти в корзину";
            } else {
                window.location.href = 'order.php';
            }
        });
    }

    static addQuantityHandlers(product, basket) {
        const quantityInput = product.querySelector('.input_price');
        const plusBtn = product.querySelector('.plus-btn');
        const minusBtn = product.querySelector('.minus-btn');

        plusBtn.addEventListener('click', () => {
            quantityInput.value++;
            basket.setQuantity(quantityInput.value);
        });

        minusBtn.addEventListener('click', () => {
            if (quantityInput.value > 1) {
                quantityInput.value--;
                basket.setQuantity(quantityInput.value);
            }
        });
    }
}