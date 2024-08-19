import {Rating} from "./Rating.js";

export class Review {

    static data = [];

    constructor(reviewData) {
        Review.data = { ...reviewData };
    }

    static updateAverageRating() {
        Rating.calcRating();
        const avRating = Rating.getAvRating();
        const prodRatingElement = document.querySelector('.prod-rating');
        if (prodRatingElement && avRating) {
            prodRatingElement.textContent = avRating.toFixed(1) + "★";
        }
    }

    static displayReview(items) {
        const review_list = document.querySelector('.reviews-list');

        const reviewItems = Array.isArray(items) ? items : [items];

        if (review_list) {
            reviewItems.forEach((item) => {
                review_list.innerHTML += `
                <div class="review-block">
                    <img src="${item.pic}" alt="photo-user">
                    <p class="name-reviewer">${item.name}</p>
                    <span class="ratings-wrapper">${item.rating}★</span>
                    <p class="text-reviewer">${item.message}</p>
                </div>
            `;
            });
        }

      $('.reviews-list').slick('unslick');
      $('.reviews-list').slick({
          dots: true,
          infinite: true,
          speed: 500,
          slidesToShow: 3,
          centerMode: true,
          variableWidth: true
      });
    }

    static displayForm(reviewForm,user){
        if(reviewForm) {
            if (user.idUser) {
                const nameInput = reviewForm.querySelector('[name="name"]');
                const photoElement = reviewForm.querySelector('[id="photo-user"]');
                nameInput.value = user.name;
                nameInput.readOnly = true;

                if (user.pic) {
                    photoElement.src = user.pic;
                }
            } else {
                const hideBlock = document.createElement('div');
                hideBlock.className = 'hideBlock';
                hideBlock.textContent = 'Авторизуйтесь';
                reviewForm.appendChild(hideBlock);
            }
        }
    }

}
