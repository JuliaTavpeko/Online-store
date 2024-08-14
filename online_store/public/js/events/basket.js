import { Basket } from '../classes/Basket.js';
import { EventHandler } from '../classes/EventHandler.js';
import { RequestManager } from '../classes/RequestManager.js';
import {Authorization} from "../classes/Authorization.js";
import {Quantity} from "../classes/Quantity.js";

document.addEventListener('DOMContentLoaded', function() {

    const prodContainer = document.querySelector('.product-container');
    if(prodContainer){
        const prodData = JSON.parse(prodContainer.getAttribute('data-prod'));
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

        const addBtn = document.querySelector('.btn_add_basket');
        addBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const basketArray = {
                idUser: Authorization.getSessionData().id,
                idProd: prodData['id'],
                nameProd: prodData['name'],
                quantity: Quantity.getQuantity(),
                price: prodData['price'],
                photo: prodData['photo'],
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
    }

    Quantity.addQuantityHandlers();
    const basketItemsContainer = document.getElementById('basket-items');
    EventHandler.addDeleteProductFromLSHandlers(basketItemsContainer);

    const orderBtn = document.querySelector('.btnOrder');
    orderBtn.addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'order.php';
    });

});
