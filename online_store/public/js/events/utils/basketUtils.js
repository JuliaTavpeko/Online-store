import {RequestManager} from "../../classes/RequestManager.js";
import {Basket} from "../../classes/Basket.js";
import {Quantity} from "../../classes/Quantity.js";

export async function fetchBasket(idUser) {
    const basketPopUp = { idUser: idUser };
    try {
        const result = await RequestManager.sendRequest('/getBasket', 'POST', basketPopUp);
        console.log('Результат запроса getBasket:', result);
        return result;
    } catch (error) {
        console.error('Ошибка при получении корзины:', error);
        throw error;
    }
}

export function processBasket(result) {
    const { totalPrice, ...items } = result;
    const itemList = Object.values(items);
    Basket.displayProduct(itemList, totalPrice);
    itemList.forEach(item => new Quantity(item));
}

export async function addToBasket(basketArray, addBtn) {
    if (addBtn.value !== "Перейти в корзину") {
        RequestManager.sendRequest('/basket', 'POST', basketArray)
            .then(result => {
                console.log('Результат запроса basket:', result);
                if (result && result.totalPrice !== undefined) {
                    const totalPrice = result.totalPrice;
                    const items = Object.keys(result)
                        .filter(key => key !== 'totalPrice')
                        .map(key => result[key]);
                    new Basket(result);
                    Basket.displayProduct(items, totalPrice);
                }
            });
        addBtn.value = "Перейти в корзину";
    } else {
        window.location.href = 'order.php';
    }
}

