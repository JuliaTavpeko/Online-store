export class Authorization {

    constructor(authData) {
        Authorization.data = { ...authData };
    }

    static getSessionData(){
        return {
            'id': Authorization.data.id,
            'login': Authorization.data.login,
            'session': Authorization.data.session,
            'cookie': Authorization.data.cookie,
            'pass': Authorization.data.pass,
            'photo': Authorization.data.photo,
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
        const userCab = document.querySelector('.user-cab');
        if (userCab) {
            userCab.textContent = Authorization.data.login;
        }

        const userPhoto = document.getElementById('user_popup');
        if (userPhoto) {
            userPhoto.innerHTML = `<img src="${Authorization.data.photo}" alt="photo-user">`;
        }

        const containerForm = document.querySelector('.container-form');
        if (containerForm) {
            containerForm.innerHTML = `
            <div class="authCont">
                <div class="authBlock">
                    <p class="welcome">Вы авторизованы!</p>
                    <img src="${Authorization.data.photo}" alt="userPhoto">
                    <p class="userName">${Authorization.data.login}</p>
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
