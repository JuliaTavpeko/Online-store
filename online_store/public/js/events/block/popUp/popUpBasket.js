document.addEventListener('DOMContentLoaded', function() {
    const openPopUpBasket = document.querySelector('.btn_basket');
    const closePopUpBasket = document.querySelector('.popUpCloseBasket');
    const popUpBasket = document.querySelector('.popUpBasket');

    openPopUpBasket.addEventListener('click', function (e){
        e.preventDefault();
        popUpBasket.classList.add('active');
        document.body.style.overflow = "hidden";
    });

    closePopUpBasket.addEventListener('click', () =>{
        popUpBasket.classList.remove('active');
        document.body.style.overflow = "";
    });

});