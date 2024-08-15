import { Basket } from '../classes/Basket.js';
import { EventHandler } from '../classes/EventHandler.js';
import { RequestManager } from '../classes/RequestManager.js';
import {Authorization} from "../classes/Authorization.js";
import {Quantity} from "../classes/Quantity.js";

document.addEventListener('DOMContentLoaded', function() {

    const basketPopUp = {
        idUser: Authorization.getSessionData().id,
    };

    if (basketPopUp['idUser']) {
        RequestManager.sendRequest('/getBasket', 'POST', basketPopUp)
            .then(result => {
                console.log('Результат запроса getBasket:', result);

                const totalPrice = result.totalPrice;
                const items = Object.keys(result)
                    .filter(key => key !== 'totalPrice')
                    .map(key => result[key]);

                Basket.displayProduct(items, totalPrice);
                items.forEach(item => {
                    new Quantity(item);
                });
            });
    }

    const prodContainer = document.querySelector('.product-container');
    if(prodContainer){
        const prodData = JSON.parse(prodContainer.getAttribute('data-prod'));

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

                        const totalPrice = result.totalPrice;
                        const items = Object.keys(result)
                            .filter(key => key !== 'totalPrice')
                            .map(key => result[key]);
                        new Basket(result);
                        Basket.displayProduct(items, totalPrice);


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

    const formBasket = document.querySelector('.formBasket');
    if(formBasket) {
        const orderBtn = formBasket.querySelector('.btnOrder');
        orderBtn.addEventListener('click', function (event) {
            event.preventDefault();
            window.location.href = 'order.php';
        });
    }
});
