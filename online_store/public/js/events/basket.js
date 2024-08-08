import { Basket } from '../classes/Basket.js';
import { EventHandler } from '../classes/EventHandler.js';
import { RequestManager } from '../classes/RequestManager.js';
import { Catalog } from "../classes/Catalog.js";
import {Authorization} from "../classes/Authorization.js";
import {Quantity} from "../classes/Quantity.js";

document.addEventListener('DOMContentLoaded', function() {

    document.addEventListener('productDataLoaded', function() {

        const addBtn = document.querySelector('.btn_add_basket');

        addBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const productData = Catalog.getProductData();
            const quantityInput = Quantity.getQuantity();
            const sessionData = Authorization.getSessionData();
            let userId;
            if(sessionData.id){
                userId = sessionData.id;
            }

            const basketArray = {idUser: userId, idProd: productData.id, nameProd: productData.name, price: productData.price, quantity: quantityInput };
            if (addBtn.value !== "Перейти в корзину") {
                RequestManager.sendRequest('/basket', 'POST', basketArray)
                    .then(result => {
                        console.log('Результат запроса basket:', result);
                        new Basket(result);
                        Basket.displayProduct();
                    });
                addBtn.value = "Перейти в корзину";
            } else {
                window.location.href = 'order.php';
            }
        });

        Quantity.addQuantityHandlers();
        const basketItemsContainer = document.getElementById('basket-items');
        EventHandler.addDeleteProductFromLSHandlers(basketItemsContainer);
    });

});
