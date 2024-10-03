if (window.location.pathname.endsWith('store.php')) {
    let header = document.querySelector('header');
    header.style.position = "fixed";
    document.write('<section class="banner"></section>');
}

window.addEventListener("scroll",function () {
    let header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 0);
});




function showMenu(city){
    document.querySelector('.textBox').value = city;
}

let dropdownMenu = document.querySelector('.dropdown-menu');
dropdownMenu.onclick = function () {
    dropdownMenu.classList.toggle('active');
}