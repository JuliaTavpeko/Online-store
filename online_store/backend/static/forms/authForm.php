<form class="form form_signin" method="post" enctype="multipart/form-data">
    <h3 class="form_title">Авторизация</h3>
    <input type="text" class="form_input" placeholder="Логин" name="loginAuth"
           id="loginAuth">
    <input type="password" class="form_input" placeholder="Пароль" name="passAuth"
           id="passAuth">
    <div class="remember">
        <label for="remember"> <input id="remember" name="remember"
                                      type="checkbox">Запомнить меня</label>
        <a class="forgot-pass">Забыли пароль?</a>
    </div>
    <p><input class="form_btn form_btn_signin" type="submit" value="Войти"></p>
</form>