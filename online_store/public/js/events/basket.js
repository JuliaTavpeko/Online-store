import { Basket } from '../classes/Basket.js';
import { EventHandler } from '../classes/EventHandler.js';
import { RequestManager } from '../classes/RequestManager.js';

document.addEventListener('DOMContentLoaded', function() {

    const idProduct = 1;

    RequestManager.sendRequest('/basket','POST', idProduct)
        .then(result => {
            console.log('Результат запроса:', result);
            new Basket(result);
            Basket.displayProduct();
            Basket.updateProductPage();
        });

    EventHandler.addAddToBasketHandler();

    const basketItemsContainer = document.getElementById('orders-items');
    EventHandler.addDeleteProductFromLSHandlers(basketItemsContainer);

});