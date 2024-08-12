import {Rating} from "./Rating.js";

export class Review {

    #photo;
    #rating;
    #name;
    #message;

    constructor(photo, name, message) {
        this.#photo = photo;
        this.#name = name;
        this.#rating = Rating.getCurrentRating();
        this.#message = message;
    }

    saveToLocalStorage() {
        const reviewers = JSON.parse(localStorage.getItem('reviewers')) || [];
        reviewers.push({photo: this.#photo, rating: this.#rating, name: this.#name, message: this.#message });
        localStorage.setItem('reviewers', JSON.stringify(reviewers));
        alert('Отзыв добавлен');
        Review.displayReview();
    }


    static updateAverageRating() {
        Rating.calcRating();
        const avRating = Rating.getAvRating();
        const prodRatingElement = document.querySelector('.prod-rating');
        if (prodRatingElement && avRating) {
            prodRatingElement.textContent = avRating.toFixed(1) + "★";
        }
    }

    static displayReview() {
        const reviewers = JSON.parse(localStorage.getItem('reviewers')) || [];
        const review_list = document.querySelector('.reviews-list');

        if (review_list) {
            reviewers.forEach(reviewer => {
                review_list.innerHTML += `
            <div class="review-block">
                <img src="${reviewer.photo}" alt="photo-user">
                <p class="name-reviewer">${reviewer.name}</p>
                <span class="ratings-wrapper">${reviewer.rating}★</span>
                <p class="text-reviewer">${reviewer.message}</p>
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
            if (user) {
                const nameInput = reviewForm.querySelector('[name="name"]');
                const photoElement = reviewForm.querySelector('[id="image-user"]');
                nameInput.value = user.login;
                nameInput.readOnly = true;

                if (user.photo) {
                    photoElement.src = user.photo;
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
