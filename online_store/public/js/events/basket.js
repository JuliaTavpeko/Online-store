import { Basket } from '../classes/Basket.js';
import { Common } from "../classes/Common.js";
import { EventHandler } from '../classes/EventHandler.js';
import { RequestManager } from '../classes/RequestManager.js';

document.addEventListener('DOMContentLoaded', function() {

    /*Basket.displayProduct();
    const product = document.querySelector('.product-container');

    let photoProd = product.querySelector('[id="prod-image"]');
    let nameElement = product.querySelector('[name="name"]');
    let nameProd = nameElement.textContent;
    let priceProd = product.querySelector('[name="priceProd"]').textContent;

    let photo = Common.getBase64Image(photoProd);

    let productData = {photo: photo, id: nameElement.dataset.idProd, name: nameProd, price: priceProd, quantity: 1};

    const basket = new Basket(productData);

    EventHandler.addQuantityHandlers(product, basket);
    EventHandler.addAddToBasketHandler(product, basket);

    const basketItemsContainer = document.getElementById('basket-items');
    EventHandler.addDeleteProductFromLSHandlers(basketItemsContainer);

    */



    const idProduct = 1;

    RequestManager.sendRequest('/basket','POST', idProduct)
        .then(result => console.log('Результат запроса:', result));



});