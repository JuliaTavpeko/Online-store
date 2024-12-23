import { Review } from '../classes/Review.js';
import {Authorization} from "../classes/Authorization.js";
import {Rating} from "../classes/Rating.js";
import {handleMakeReview, handleReviews} from "./utils/reviewUtils.js";

document.addEventListener('DOMContentLoaded', function () {

    const tabItem = document.querySelectorAll('.product__tabs-item');
    const tabContent = document.querySelectorAll('.tab-hidden');
    const readMoreBtn = document.querySelectorAll('.btn_read-more');

    for(let item of tabItem){
        item.addEventListener('click', function (event){
            event.preventDefault();

            const tab = document.querySelector('#' + item.dataset.tab);

            if (item.classList.contains('active')) {
                item.classList.remove('active');
                tab.classList.add('tab-hidden');
            } else {
                tabItem.forEach(tab => tab.classList.remove('active'));
                tabContent.forEach(content => content.classList.add('tab-hidden'));

                item.classList.add('active');
                tab.classList.remove('tab-hidden');
            }
        });
    }

    readMoreBtn.forEach((button, index) => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const tab = tabItem[index];
            const tabContentItem = document.querySelector('#' + tab.dataset.tab);

            tabItem.forEach(tab => tab.classList.remove('active'));
            tabContent.forEach(content => content.classList.add('tab-hidden'));

            tab.classList.add('active');
            tabContentItem.classList.remove('tab-hidden');
        });
    });

    const reviewForm = document.querySelector('.reviews');
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

        handleReviews(prodReviews);
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
                    message: document.querySelector('.reviews__user-text').value,
                    pic: Authorization.getSessionData().photo,
                };

                handleMakeReview(reviewData);
            });
        }
    }
});
