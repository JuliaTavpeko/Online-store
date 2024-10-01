<form class="form form_signup" id="form_reg" method="post" enctype="multipart/form-data">
    <h3 class="form_title">Регистрация</h3>
    <input type="text" class="form_input" placeholder="Логин" name="login" id="login">
    <input type="email" class="form_input" placeholder="Email" name="email" id="email">
    <input type="password" class="form_input" placeholder="Пароль" name="pass" id="pass">
    <input type="password" class="form_input" placeholder="Подтвердите пароль"
           name="passRepeat" id="passRepeat">
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