export class Review {

    static data = [];

    constructor(reviewData) {
        Review.data = { ...reviewData };
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
    }

    static displayForm(reviewForm,user){
        if(reviewForm) {
            if (user.idUser) {
                const nameInput = reviewForm.querySelector('.reviews__user-name');
                const photoElement = reviewForm.querySelector('.reviews__user-image');
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
