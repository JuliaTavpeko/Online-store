import { Basket } from '../classes/Basket.js';
import { EventHandler } from '../classes/EventHandler.js';
import { RequestManager } from '../classes/RequestManager.js';

document.addEventListener('DOMContentLoaded', function() {


    const basketArray = {
      "user": "Vova",
      "nameProd": "Смартфон HONOR Magic6 Pro 12GB/512GB международная версия (шалфейный зеленый)",
      "quantity": 2,
      "price": 25,
    };


    let addBtn = document.querySelector('.btn_add_basket');

    addBtn.addEventListener('click', function(event) {
        event.preventDefault();

        if (addBtn.value !== "Перейти в корзину") {
            RequestManager.sendRequest('/basket','POST', basketArray)
                .then(result => {
                    console.log('Результат запроса:', result);
                    new Basket(result);
                    Basket.displayProduct();
                });
            addBtn.value = "Перейти в корзину";
        } else {
            window.location.href = 'order.php';
        }
    });


    const basketItemsContainer = document.getElementById('basket-items');
    EventHandler.addDeleteProductFromLSHandlers(basketItemsContainer);

});