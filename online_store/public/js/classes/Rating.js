export class Rating {
    constructor() {
        this.currentRating = null;
        this.avRating = null;
        this.ratings = [];
    }

    static calcRating() {
        let stars = document.querySelectorAll(".ratings span");

        for (let star of stars) {
            star.addEventListener("click", () => {
                let children = star.parentElement.children;
                for (let child of children) {
                    if (child.getAttribute("data-clicked")) {
                        child.removeAttribute("data-clicked");
                    }
                }

                star.setAttribute("data-clicked", "true");
                this.currentRating = star.dataset.rating;
                this.ratings.push(this.currentRating);
                localStorage.setItem("rating", JSON.stringify(this.ratings));
            });
        }

        if (localStorage.getItem("rating")) {
            this.ratings = JSON.parse(localStorage.getItem("rating"));
            let sum = 0;
            let lengthRating = this.ratings.length;
            sum = this.ratings.reduce((x, rating) => x + parseFloat(rating), 0);
            this.avRating = sum / lengthRating;
        }
        return 0;
    }

    static getCurrentRating() {
        return this.currentRating;
    }

    static getAvRating() {
        return this.avRating;
    }
}