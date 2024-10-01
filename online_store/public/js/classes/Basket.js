import {EventHandler} from "./EventHandler.js";
import {RequestManager} from "./RequestManager.js";

export class Basket {

    static data = [];

    constructor(prodData) {
        Basket.data = { ...prodData };
    }

    static displayProduct(items, totalPrice) {
        const basketItemsContainers = document.querySelectorAll('[id="basket-items"]');

        basketItemsContainers.forEach(container => {
            container.innerHTML = '';

            items.forEach((item) => {
                const itemRow = `
                <tr class="basket_item" data-id="${item.id}">
                    <td>
                        <span class="delete-btn" data-id="${item.idProd}">
                            <img src="image/png/icon/delete.png" alt="delete">
                        </span>
                    </td>
                    <td>
                        <img src="${item.photo}" alt="prodPic" style="width: 90px; height: 110px;" class="photo-prod">
                    </td>
                    <td class="prodName">${item.nameProd}</td>
                    <td class="prodPrice">${item.price} руб.</td>
                    <td>
                        <div class="quantity">
                            <button class="minus-btn" type="button" name="button">
                                <img src="image/svg/icon/minus.svg" alt="minus" />
                            </button>
                            <input type="number" class="input_price" data-price="${item.price}" value="${item.quantity}" disabled>
                            <button class="plus-btn" type="button" name="button">
                                <img src="image/svg/icon/plus.svg" alt="plus" />
                            </button>
                        </div>
                    </td>
                    <td class="subtotal">
                        <span class="price">${item.itemPrice} руб.</span>
                    </td>
                </tr>
            `;
                container.innerHTML += itemRow;
            });

            const totalPriceElement = container.querySelector('.total-price');
            if (totalPriceElement) {
                totalPriceElement.textContent = `${totalPrice}`;
            }
            EventHandler.addDeleteProductFromBasketHandlers(container);
        });
    }

    static async deleteBasket(idUser) {
        const requestData = { idUser: idUser };
        RequestManager.sendRequest('/clearBasket', 'POST', requestData)
            .then(result => {
                console.log('Результат запроса clearBasket:', result);
            });
    }

    static async deleteProduct(idUser, idProd) {
        const requestData = { idUser: idUser, idProd: idProd };
        RequestManager.sendRequest('/deleteProduct', 'POST', requestData)
            .then(result => {
                console.log('Результат запроса deleteProduct:', result);
            });
    }
}
