import { Basket } from '../classes/Basket.js';
import { EventHandler } from '../classes/EventHandler.js';
import { RequestManager } from '../classes/RequestManager.js';
import { Catalog } from "../classes/Catalog.js";
import {Authorization} from "../classes/Authorization.js";
import {Quantity} from "../classes/Quantity.js";

document.addEventListener('DOMContentLoaded', function() {

    const basketPopUp = {
        idUser: Authorization.getSessionData().id,
    };

    if(basketPopUp['idUser']){
            RequestManager.sendRequest('/getBasket', 'POST', basketPopUp)
            .then(result => {
            console.log('Результат запроса getBasket:', result);
            Basket.displayProduct(result);
        });
    }

    document.addEventListener('productDataLoaded', function() {
        const addBtn = document.querySelector('.btn_add_basket');

        addBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const basketArray = {
                idUser: Authorization.getSessionData().id,
                idProd: Catalog.getProductData().id,
                nameProd: Catalog.getProductData().name,
                quantity: Quantity.getQuantity(),
                price: Catalog.getProductData().price,
            };
            if (addBtn.value !== "Перейти в корзину") {
                RequestManager.sendRequest('/basket', 'POST', basketArray)
                    .then(result => {
                        console.log('Результат запроса basket:', result);
                        new Basket(result);
                        Basket.displayProduct(result);
                    });
                addBtn.value = "Перейти в корзину";
            } else {
                window.location.href = 'order.php';
            }
        });

        Quantity.addQuantityHandlers();
        const basketItemsContainer = document.getElementById('basket-items');
        EventHandler.addDeleteProductFromLSHandlers(basketItemsContainer);

        const orderBtn = document.querySelector('.btnOrder');
        orderBtn.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = 'order.php';
        });
    });



});
