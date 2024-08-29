<!DOCTYPE html>
<html>
<head>
    <title> Восстановление пароля </title>
    <meta charset="utf-8" />

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/user/forgotPass.css" rel="stylesheet">

    <link href="css/user/popUpUser.css" rel="stylesheet">
    <link href="css/basket/popUpBasket.css" rel="stylesheet">

</head>
<?php require ROOT . '/backend/static/blocks/header.php' ?>
<body>
<div class="main">

    <div class="forgot-page">

        <form class="forgot-pass">
            <h1>Восстановление пароля</h1>
            <label>Введите логин:
                <input type="text" name="forgotLogin" id="forgotLogin">
            </label>
            <label>Введите новый пароль:
                <input type="password" name="forgotPass" id="forgotPass">
            </label>
            <label>Повторите пароль:
                <input type="password" name="forgotNewPass" id="forgotNewPass">
            </label>
            <button>Изменить</button>
        </form>
    </div>

</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>