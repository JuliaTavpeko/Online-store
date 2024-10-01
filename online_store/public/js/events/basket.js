import { Authorization } from "../classes/Authorization.js";
import { Quantity } from "../classes/Quantity.js";
import { fetchBasket, processBasket, addToBasket } from './utils/basketUtils.js';

document.addEventListener('DOMContentLoaded', async function() {

    const idUser = Authorization.getSessionData().id;
    if (idUser) {
        fetchBasket(idUser)
            .then(result => processBasket(result))
            .catch(error => console.error('Ошибка при получении корзины:', error));
    }

    const prodContainer = document.querySelector('.product-container');
    if (prodContainer && idUser) {
        const prodData = JSON.parse(prodContainer.getAttribute('data-prod'));
        const addBtn = document.querySelector('.btn_add_basket');

        addBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const basketArray = {
                idUser: idUser,
                idProd: prodData.id,
                nameProd: prodData.name,
                quantity: Quantity.getQuantity(),
                price: prodData.price,
                photo: prodData.currentColorInfo.photo || '',
            };

            addToBasket(basketArray, addBtn);
        });
    }

    await Quantity.addQuantityHandlers();

    const formBasket = document.querySelector('.formBasket');
    if (formBasket) {
        const orderBtn = formBasket.querySelector('.btnOrder');
        orderBtn.addEventListener('click', function (event) {
            event.preventDefault();
            window.location.href = 'order.php';
        });
    }
});
