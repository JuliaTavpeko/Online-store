<div class="popup" id="popup">
        <div class="popup-container">
            <div class="popup-body" id="body_popup">
                <div class="wrapper">
                    <div class="body-container">
                        <article class="container-form">
                            <div class="block">
                                <section class="block_item block-item">
                                    <h2 class="block-item_title">Авторизация</h2>
                                    <button class="block-item_btn signin-btn">Войти</button>
                                </section>
                                <section class="block_item block-item">
                                    <h2 class="block-item_title">Нет аккаунта?</h2>
                                    <button class="block-item_btn signup-btn">Зарегистрироваться</button>
                                </section>
                            </div>
                            <div class="form-box" id="form-box">
                                <form class="form form_signin" method="post" enctype="multipart/form-data" action="">
                                    <h3 class="form_title">Авторизация</h3>
                                    <p><input type="text" class="form_input" placeholder="Логин" name="loginAuth" id="loginAuth"></p>
                                    <p><input type="password" class="form_input" placeholder="Пароль" name="passAuth" id="passAuth"></p>
                                    <div class="remember">
                                        <label for="remember"> <input id="remember" name="remember" type="checkbox">Запомнить меня</label>
                                        <!--<a href="forgotPassword.php" class="forget-pass">Забыли пароль?</a>-->
                                        <a class="forgot-pass">Забыли пароль?</a>
                                    </div>
                                    <p><input class="form_btn form_btn_signin" type="submit" value="Войти"></p>
                                </form>
                                <form class="form form_signup" id="form_reg" method="post" enctype="multipart/form-data" action="">
                                    <h3 class="form_title">Регистрация</h3>
                                    <p><input type="text" class="form_input" placeholder="Логин" name="login" id="login"></p>
                                    <p><input type="email" class="form_input" placeholder="Email" name="email" id="email"></p>
                                    <p><input type="password" class="form_input" placeholder="Пароль" name="pass" id="pass"></p>
                                    <p><input type="password" class="form_input" placeholder="Подтвердите пароль" name="passRepeat" id="passRepeat"></p>
                                    <img id="preview" src="" alt="Превью изображения"/>
                                    <input type="file" id="imageInput" accept="image/*" onchange="displayImage(this)"/>
                                    <script>
                                        function displayImage(inputElement) {
                                            const file = inputElement.files[0];
                                            const imageURL = URL.createObjectURL(file);
                                            document.getElementById('preview').src = imageURL;
                                            document.getElementById('imageInput').textContent = file.name;
                                            inputElement.value = null;
                                            document.getElementById('preview').onload = () => URL.revokeObjectURL(imageURL);
                                        }
                                    </script>
                                    <p><input class="form_btn form_btn_signup" type="submit" value="Зарегристрироваться"></p>
                                </form>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="popup-close" id="close_popup" style="color: #fff">&#10006</div>
            </div>
        </div>
    </div>