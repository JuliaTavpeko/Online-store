import {Review} from "../../classes/Review.js";
import {RequestManager} from "../../classes/RequestManager.js";

export async function handleReviews(prodReviews) {
    try {
        const result = await RequestManager.sendRequest('/reviews', 'POST', prodReviews);
        console.log('Результат запроса reviews:', result);
        Review.displayReview(result);
        return result;
    } catch (error) {
        console.error('Ошибка при обработке отзывов:', error);
        throw error;
    }
}

export async function handleMakeReview(reviewData) {
    try {
        const result = await RequestManager.sendRequest('/makeReview', 'POST', reviewData);
        console.log('Результат запроса makeReview:', result);
        if (result !== false) {
            new Review(result);
        }
        return result;
    } catch (error) {
        console.error('Ошибка при создании отзыва:', error);
        throw error;
    }
}
