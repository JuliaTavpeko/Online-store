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

    static async addDeleteProductFromLSHandlers(basketItemsContainer) {
        basketItemsContainer.querySelectorAll('.delete-btn').forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', () => {
                const userId = Authorization.getSessionData().id;
                if (userId) {
                    Basket.deleteProduct(userId);
                }
            });
        });
    }


}