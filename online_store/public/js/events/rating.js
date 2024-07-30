let currentRating = null;
let avRating = null;

export function calcRating() {
    let stars = document.querySelectorAll(".ratings span");
    let ratings = [];

    for (let star of stars) {
        star.addEventListener("click", function () {

            let children = star.parentElement.children;
            for (let child of children) {
                if (child.getAttribute("data-clicked")) {
                    child.removeAttribute("data-clicked");
                }
            }

            this.setAttribute("data-clicked", "true");
            currentRating = this.dataset.rating;
            ratings.push(currentRating);
            localStorage.setItem("rating", JSON.stringify(ratings));
        });
    }

    if (localStorage.getItem("rating")) {
        ratings = JSON.parse(localStorage.getItem("rating"));
        let sum = 0;
        let lengthRating = ratings.length;
        sum = ratings.reduce((x, rating) => x + parseFloat(rating), 0);
        avRating = sum / lengthRating;
    }
    return 0;
}

export function getCurrentRating() {
    return currentRating;
}

export function getAvRating() {
    return avRating;
}