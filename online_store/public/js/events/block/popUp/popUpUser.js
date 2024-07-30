document.addEventListener('DOMContentLoaded', function() {
    const openPopUp = document.querySelector('.btn_popup');
    const closePopUp = document.querySelector('.popup-close');
    const popUp = document.querySelector('.popup');

    openPopUp.addEventListener('click', function (e){
        e.preventDefault();
        popUp.classList.add('active');
        document.body.style.overflow = "hidden";
    });

    closePopUp.addEventListener('click', () =>{
        popUp.classList.remove('active');
        document.body.style.overflow = "";
    });

});