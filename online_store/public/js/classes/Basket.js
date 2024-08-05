import { Common } from "./Common.js";

export class Basket {

    static data = [];

    constructor(prodData) {
        Basket.data = {
            'id': prodData['id'],
            'user': prodData['user'],
            'name': prodData['nameProd'],
            'quantity': prodData['quantity'],
            'price': prodData['price'],
            'photo': prodData['Photo'],
        };
    }

    static setQuantity(newQuantity) {
        Basket.data.quantity = newQuantity;
        console.log('Basket.data.quantity:', Basket.data.quantity);
        console.log('newQuantity:', newQuantity);
        return Basket.data.quantity;
    }

    static getQuantity(result) {
        return result;
    }

    static displayProduct() {

        const basketItemsContainer = document.getElementById('basket-items');
        basketItemsContainer.innerHTML = '';

        console.log('setQuantity():',this.setQuantity());
        [Basket.data].forEach((item) => {
            const itemRow = `
                <tr class="basket_item">
                    <td>
                        <span class="delete-btn" data-id="${item.id}">
                            <img src="image/png/icon/delete.png" alt="delete">
                        </span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,${item.photo}" alt="prodPic" style="width: 90px; height: 110px;" class="photo-prod">
                    </td>
                    <td class="prodName">${item.name}</td>
                    <td class="prodPrice">${item.price} руб.</td>
                    <td>
                        <div class="quantity">
                           <button class="minus-btn" type="button" name="button">
                                <img src="image/svg/icon/minus.svg" alt="minus" />
                            </button>
                            <input type="number" class="input_price" data-price="${item.price}" value="${Basket.getQuantity()}" disabled>
                            <button class="plus-btn" type="button" name="button">
                                <img src="image/svg/icon/plus.svg" alt="plus" />
                            </button>
                        </div>
                    </td>
                    <td class="subtotal">
                        <span class="price">${Common.formatNumber(item.quantity * item.price)} руб.</span>
                    </td>
                </tr>
            `;

            basketItemsContainer.innerHTML += itemRow;
        });
    }


}