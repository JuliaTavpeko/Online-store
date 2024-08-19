import { Review } from '../classes/Review.js';
import {RequestManager} from "../classes/RequestManager.js";
import {Authorization} from "../classes/Authorization.js";
import {Rating} from "../classes/Rating.js";

document.addEventListener('DOMContentLoaded', function () {

    const reviewForm = document.querySelector('[name="review"]');
    const idUser = Authorization.getSessionData().id;
    const prodContainer = document.querySelector('.product-container');
    const message = document.querySelector('textarea[name="message"]').value;

    if(prodContainer) {
        const prodData = JSON.parse(prodContainer.getAttribute('data-prod'));

        const userData = {
            idUser: idUser,
            name: Authorization.getSessionData().login,
            pic: Authorization.getSessionData().photo,
        };

        const prodReviews = {
            idProd: prodData['id'],
        };

        RequestManager.sendRequest('/reviews', 'POST', prodReviews)
            .then(result => {
                console.log('Результат запроса reviews:', result);
               Review.displayReview(result);
            });

        const reviewData = {
            idUser: idUser,
            idProd: prodData['id'],
            //rating: Rating.getCurrentRating(),
            rating: 1,
            name: Authorization.getSessionData().login,
            message: message,
            pic: Authorization.getSessionData().photo,
        };

        console.log("reviewData:",reviewData);

        if (reviewForm) {
            Review.displayForm(reviewForm, userData);
            reviewForm.addEventListener('submit', function (event) {
                event.preventDefault();

                RequestManager.sendRequest('/makeReview', 'POST', reviewData)
                    .then(result => {
                        console.log('Результат запроса makeReview:', result);
                        if (result !== false) {
                            new Review(result);
                            //Review.updateAverageRating();
                        }
                    });
            });
        }
    }
});
