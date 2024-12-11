export class Rating {
    static currentRating = null;
    static ratings = [];

    static calcRating() {
        let stars = document.querySelectorAll(".reviews__rating-rank span");

        for (let star of stars) {
            star.addEventListener("click", () => {
                let ratingValue = star.dataset.rating;

                let children = star.parentElement.children;
                for (let child of children) {
                    if (child.getAttribute("data-clicked")) {
                        child.removeAttribute("data-clicked");
                    }
                }

                star.setAttribute("data-clicked", "true");
                Rating.currentRating = ratingValue;
                Rating.ratings.push(Rating.currentRating);
            });
        }
    }

    static getCurrentRating() {
        return Rating.currentRating;
    }
}
