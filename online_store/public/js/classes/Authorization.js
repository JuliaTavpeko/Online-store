export class Authorization {


    constructor(authData) {
        Authorization.data = {
            'cookie': authData['cookie'],
            'id': authData['id'],
            'login': authData['login'],
            'pass': authData['pass'],
            'photo': authData['photo'],
        };
    }
    
    static get data() {
        const data = sessionStorage.getItem('authData');
        return data ? JSON.parse(data) : {};
    }

    static set data(authData) {
        sessionStorage.setItem('authData', JSON.stringify(authData));
    }

    static displayUser() {
        const data = Authorization.data;
        const userCab = document.querySelector('.user-cab');
        if (userCab) {
            userCab.textContent = data.login;
        }

        const userPhoto = document.getElementById('user_popup');
        if (userPhoto) {
            userPhoto.innerHTML = `<img src="${data.photo}" alt="photo-user">`;
        }

        const containerForm = document.querySelector('.container-form');
        if (containerForm) {
            containerForm.innerHTML = `
            <div class="authCont">
                <div class="authBlock">
                    <p class="welcome">Вы авторизованы!</p>
                    <img src="${data.photo}" alt="userPhoto">
                    <p class="userName">${data.login}</p>
                    <button class="logOut">Выйти</button>
                </div>
            </div>
        `;

            Authorization.addLogoutClickListener();
        }
    }

    static async addLogoutClickListener() {
        const logOutBtn = document.querySelector('.logOut');
        if (logOutBtn) {
            logOutBtn.addEventListener('click', async () => {
               await Authorization.logout();
            });
        }
    }

    static async logout() {
        try {
            const response = await fetch('/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();
            console.log('Logout response:', result);
            if (result.success) {
                sessionStorage.removeItem('authData');
                return true;
            }
        } catch (error) {
            console.error('Ошибка при выходе из системы:', error);
        }
        return false;
    }
}
