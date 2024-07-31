import { Common } from "./Common.js";

export class Basket {

    static data = [];

    constructor(prodData) {
        Basket.data = {
            'id': prodData['id'],
            'name': prodData['Name'],
            'price': prodData['Price'],
            'photo': prodData['Photo'],
            'description': prodData['Description'],
        };
    }

    static deleteProduct(id){

    }

    static displayProduct() {

        const basketItemsContainer = document.getElementById('orders-items');
        basketItemsContainer.innerHTML = '';

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
                            <button class="minus-btn" type="button">
                                <img src="image/svg/icon/minus.svg">
                            </button>
                           <!-- <input type="number" class="input_price" data-price="${item.price}" value="${item.amountProd}" disabled>-->
                            <button class="plus-btn" type="button">
                                <img src="image/svg/icon/plus.svg">
                            </button>
                        </div>
                    </td>
                    <td class="subtotal">
                      <!--  <span class="price">${Common.formatNumber(item.amountProd * item.price)} руб.</span>-->
                    </td>
                </tr>
            `;

            basketItemsContainer.innerHTML += itemRow;
        });
    }

    static saveToSessionStorage(){

    }

    static updateProductPage() {
        document.getElementById('prod-photo').src = `data:image/png;base64,${Basket.data.photo}`;
        document.querySelector('[name="name"]').textContent = Basket.data.name;
        document.querySelector('[name="priceProd"]').textContent = Basket.data.price;
        document.querySelector('[name="description"]').textContent = Basket.data.description;
    }

}