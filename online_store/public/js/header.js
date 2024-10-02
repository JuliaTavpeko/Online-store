if (window.location.pathname.endsWith('store.php')) {
    let header = document.querySelector('header');
    header.style.position = "fixed";
    document.write('<section class="banner"></section>');
}

window.addEventListener("scroll",function () {
    let header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 0);

});

function updateCity(selectElement) {
    let selectedCity = selectElement.options[selectElement.selectedIndex].text;
    document.querySelector('.selected-city').textContent = selectedCity;
}