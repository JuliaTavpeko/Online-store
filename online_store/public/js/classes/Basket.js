import { Common } from "./Common.js";

export class Basket {

    constructor() {

    }


    static displayProduct() {

        const basketItemsContainer = document.getElementById('basket-items');

        basketItemsContainer.innerHTML = '';

        userBasket.forEach((item) => {
            const itemRow = `
                <tr class="basket_item">
                    <td>
                        <span class="delete-btn" data-id="${item.idProd}">
                            <img src="photo/delete.png" alt="delete">
                        </span>
                        <span class="like-btn">
                            <img src="photo/favorite.png" alt="favorite">
                        </span>
                    </td>
                    <td>
                        <img src="${item.photo}" alt="prodPic" style="width: 110px; height: 130px;" class="photo-prod">
                    </td>
                    <td class="prodName">${item.name}</td>
                    <td class="prodPrice">${item.price} руб.</td>
                    <td>
                        <div class="quantity">
                            <button class="minus-btn" type="button">
                                <img src="photo/minus.svg">
                            </button>
                            <input type="number" class="input_price" data-price="${item.price}" value="${item.amountProd}" disabled>
                            <button class="plus-btn" type="button">
                                <img src="photo/plus.svg">
                            </button>
                        </div>
                    </td>
                    <td class="subtotal">
                        <span class="price">${Common.formatNumber(item.amountProd * item.price)} руб.</span>
                    </td>
                </tr>
            `;

            basketItemsContainer.innerHTML += itemRow;
        });

    }

}