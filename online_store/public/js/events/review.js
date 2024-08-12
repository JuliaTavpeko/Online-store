import { Review } from '../classes/Review.js';

document.addEventListener('DOMContentLoaded', function () {
    const reviewForm = document.querySelector('[name="review"]');
    const user = JSON.parse(sessionStorage.getItem('currentUser'));

    Review.displayForm(reviewForm,user);
    if(reviewForm) {
        reviewForm.addEventListener('submit', function (event) {
            event.preventDefault();

            let message = reviewForm.querySelector('[name="message"]').value;
            const reviewer = new Review(user.photo, user.login, message);
            reviewer.saveToLocalStorage();

            reviewForm.reset();
        });

        Review.updateAverageRating();
        Review.displayReview();
    }
});
