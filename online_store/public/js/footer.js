window.addEventListener('scroll', function () {
    let scrollPage = document.querySelector('.btn-up');
    let footer = document.querySelector('footer');
    let footerRect = footer.getBoundingClientRect();
    let windowHeight = window.innerHeight;
    let distanceFromBottom = footerRect.top - windowHeight;

    if (window.scrollY > 200) {
        scrollPage.classList.add("active");
    } else {
        scrollPage.classList.remove("active");
    }

    if (distanceFromBottom < 20) {
        scrollPage.style.bottom = `${20 - distanceFromBottom}px`;
    } else {
        scrollPage.style.bottom = '50px';
    }
});

function scrollTopTop(){
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}
