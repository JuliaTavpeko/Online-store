import {Authorization} from "./Authorization.js";
import {RequestManager} from "./RequestManager.js";

export class Quantity {
    static currentQuantity = 1;
    static data = [];

    constructor(quantityData) {
        Quantity.data.push({
            'id': quantityData['id'],
            'idUser': quantityData['idUser'],
            'idProd': quantityData['idProd'],
            'nameProd': quantityData['nameProd'],
            'price': quantityData['price'],
            'photo': quantityData['photo'],
        });
    }

    static setQuantity(newQuantity) {
        Quantity.currentQuantity = newQuantity;
    }

    static getQuantity() {
        return Quantity.currentQuantity;
    }

    static addQuantityHandlers() {
        document.addEventListener('click', (event) => {
            const button = event.target.closest('.plus-btn, .minus-btn');
            if (button) {
                const product = button.closest('.basket_item');
                const quantityInput = product.querySelector('.input_price');
                const productId = product.dataset.id;

                if (button.classList.contains('plus-btn')) {
                    quantityInput.value++;
                } else if (button.classList.contains('minus-btn')) {
                    quantityInput.value = quantityInput.value > 1 ? quantityInput.value - 1 : quantityInput.value;
                }

                Quantity.setQuantity(quantityInput.value);

                const selectedProduct = Quantity.data.find(item => item.id == productId);

                if (selectedProduct) {
                    const quantData = {
                        idUser: Authorization.getSessionData().id,
                        idProd: selectedProduct.idProd,
                        nameProd: selectedProduct.nameProd,
                        quantity: Quantity.getQuantity(),
                        price: selectedProduct.price,
                        photo: selectedProduct.photo,
                    };

                    const subtotalElement = product.querySelector('.subtotal .price');

                    if (quantData && subtotalElement) {
                        RequestManager.sendRequest('/basket', 'POST', quantData)
                            .then(result => {
                                console.log('Результат запроса updateBasket:', result);
                                if (result && result.itemPrice) {
                                    if (subtotalElement) {
                                        subtotalElement.textContent = `${result.itemPrice} руб.`;
                                    }
                                }
                            });
                    }
                } else {
                    console.log(`Product with id ${productId} not found in Quantity.data.`);
                }
            }
        });
    }
}
