import { Review } from '../classes/Review.js';
import {RequestManager} from "../classes/RequestManager.js";
import {Authorization} from "../classes/Authorization.js";
import {Rating} from "../classes/Rating.js";

document.addEventListener('DOMContentLoaded', function () {

    const tabItem = document.querySelectorAll('.tab');
    const tabContent = document.querySelectorAll('.tab-hidden');

    for(let item of tabItem){
        item.addEventListener('click', function (event){
            event.preventDefault();

            for(let content of tabContent){
                content.classList.add('tab-hidden');
            }

            const tab = document.querySelector('#' + item.dataset.tab);
            tab.classList.remove('tab-hidden');
        });
    }



    const reviewForm = document.querySelector('[name="review"]');
    const idUser = Authorization.getSessionData().id;
    const prodContainer = document.querySelector('.product-container');

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

        Rating.calcRating();

        if (reviewForm) {
            Review.displayForm(reviewForm, userData);
            reviewForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const reviewData = {
                    idUser: idUser,
                    idProd: prodData['id'],
                    rating: Rating.getCurrentRating(),
                    name: Authorization.getSessionData().login,
                    message: document.querySelector('textarea[name="message"]').value,
                    pic: Authorization.getSessionData().photo,
                };

                console.log("reviewData:",reviewData);

                RequestManager.sendRequest('/makeReview', 'POST', reviewData)
                    .then(result => {
                        console.log('Результат запроса makeReview:', result);
                        if (result !== false) {
                            new Review(result);
                        }
                    });
            });
        }
    }
});
