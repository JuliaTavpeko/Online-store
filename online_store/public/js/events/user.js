import { Common } from "../classes/Common.js";
import { RequestManager } from '../classes/RequestManager.js';
import { Authorization } from "../classes/Authorization.js";
import { EventHandler } from "../classes/EventHandler.js";

document.addEventListener('DOMContentLoaded', function() {

    if (Authorization.data.login) {
        Authorization.displayUser();
    }

    const signInBtn = document.querySelector('.signin-btn');
    const signUpBtn = document.querySelector('.signup-btn');
    const formBox = document.querySelector('.form-box');
    const body = document.querySelector('.body-container');

    if (signUpBtn && formBox && body) {
        signUpBtn.addEventListener('click', function (){
            formBox.classList.add('active');
            body.classList.add('active');
        });
    }

    if (signInBtn && formBox && body) {
        signInBtn.addEventListener('click', function () {
            formBox.classList.remove('active');
            body.classList.remove('active');
        });
    }

    const form_for_reg = document.querySelector('.form_signup');

    if (form_for_reg) {
        form_for_reg.addEventListener('submit', async function (event) {
            event.preventDefault();

            const regArray = form_for_reg.querySelectorAll('.form_input');
            const regData = {};

            regArray.forEach(element => {
                regData[element.name] = element.value;
            });

            let photoElement = form_for_reg.querySelector('[id="preview"]');
            regData['photo'] = Common.getBase64Image(photoElement);

            RequestManager.sendRequest('/register', 'POST', regData)
                .then(result => console.log('Результат запроса:', result));

        });
    }

    const form_for_auth = document.querySelector('.form_signin');

    if (form_for_auth) {
        form_for_auth.addEventListener('submit', async function (event) {
            event.preventDefault();

            const authArray = form_for_auth.querySelectorAll('.form_input');
            const authData = {};

            authArray.forEach(element => {
                authData[element.name] = element.value;
            });

            authData['checkbox'] = form_for_auth.querySelector('[name="remember"]').checked;

            RequestManager.sendRequest('/auth', 'POST', authData)
                .then(result => {
                    console.log('Результат запроса:', result);
                    new Authorization(result);
                    Authorization.displayUser();
                });
        });
        EventHandler.addPasswordFocusHandler(form_for_auth);
    }
});
