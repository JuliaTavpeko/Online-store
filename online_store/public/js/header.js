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


if (!window.location.pathname.endsWith('store.php')) {
    let header = document.querySelector('header');
    header.style.background = "#000";

    let logo = document.querySelector('header .logo');
    if (logo) {
        logo.style.color = "#fff";
    }

    let links = document.querySelectorAll('header ul li a');
    links.forEach(link => {
        link.style.color = "#fff";
    });

    let stickyElements = document.querySelectorAll('header svg, header span, header a');
    stickyElements.forEach(element => {
        if (!(element.tagName === 'svg' && element.closest('.rightside-sm-icons'))) {
            element.style.fill = "#fff";
            element.style.color = "#fff";
        }
    });

}
