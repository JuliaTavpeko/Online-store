import {RequestManager} from "../../classes/RequestManager.js";
import {Order} from "../../classes/Order.js";

export async function sendOrderRequest(orderData) {
    try {
        const result = await RequestManager.sendRequest('/order', 'POST', orderData);
        console.log('Результат запроса order:', result);
        if (result !== false) {
            new Order(result);
            window.location.href = `orderSuccess.php?order=${result.id}`;
        }
    } catch (error) {
        console.error('Ошибка при отправке заказа:', error);
    }
}

export async function fetchOrder(idUser) {
    try {
        const result = await RequestManager.sendRequest('/getOrder', 'POST', idUser);
        console.log('Результат запроса getOrder:', result);
        if (result !== false) {
            Order.displayOrder(result);
        }
    } catch (error) {
        console.error('Ошибка при получении заказа:', error);
    }
}
