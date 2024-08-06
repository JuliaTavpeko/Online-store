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

    static addQuantityHandlers() {
        document.addEventListener('click', (event) => {
            const button = event.target.closest('.plus-btn, .minus-btn');
            if (button) {
                const product = button.closest('.quantity');
                const quantityInput = product.querySelector('.input_price');
                if (button.classList.contains('plus-btn')) {
                    quantityInput.value++;
                    Basket.setQuantity(quantityInput.value);
                } else if (button.classList.contains('minus-btn')) {
                    quantityInput.value = quantityInput.value > 1 ? quantityInput.value - 1 : quantityInput.value;
                    Basket.setQuantity(quantityInput.value);
                }
            }
        });

    }
}