import { Basket } from './Basket.js';
import {Authorization} from "./Authorization.js"

export class EventHandler {

    static async addPasswordFocusHandler(form_for_auth) {
        form_for_auth.querySelector('[name="passAuth"]').addEventListener('focus', function () {
            let log_in = form_for_auth.querySelector('[name="loginAuth"]').value;
           /* console.log('log_in',log_in);
            console.log('Authorization.data.cookie',Authorization.getSessionData().cookie);
            console.log('Authorization.data.login',Authorization.getSessionData().login);
            console.log('Authorization.data.pass',Authorization.getSessionData().pass);*/

            if (Authorization.getSessionData().cookie && Authorization.getSessionData().login && Authorization.getSessionData().pass) {
                if (Authorization.getSessionData().login === log_in) {
                    form_for_auth.querySelector('[name="passAuth"]').value = Authorization.getSessionData().pass;
                }
            }
        });
    }

    static async addDeleteBasketFromDBHandlers() {
        const userId = Authorization.getSessionData().id;
        if (userId) {
            await Basket.deleteBasket(userId);
        }
    }

    static async addDeleteProductFromBasketHandlers(basketItemsContainers) {
        basketItemsContainers.querySelectorAll('.delete-btn').forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', () => {
                const idProd = deleteBtn.getAttribute('data-id');
                Basket.data.idProd = idProd;
                const userId = Authorization.getSessionData().id;
                if (userId) {
                    Basket.deleteProduct(userId,idProd);
                }
            });
        });
    }

}