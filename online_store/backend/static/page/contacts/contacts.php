<!DOCTYPE html>
<html>
<head>
    <title> Контакты </title>
    <meta charset="utf-8" />

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/user/user.css" rel="stylesheet">
    <link href="css/basket/basket.css" rel="stylesheet">

    <script src="js/events/user.js" type="module" defer></script>
    <script src="js/events/basket.js" type="module" defer></script>

    <link href="css/user/popUpUser.css" rel="stylesheet">
    <link href="css/basket/popUpBasket.css" rel="stylesheet">

    <script src="js/events/block/popUp/popUpUser.js" defer></script>
    <script src="js/events/block/popUp/popUpBasket.js" type="module" defer></script>

</head>
<?php require ROOT . '/backend/static/blocks/header.php' ?>
<body>
<div class="main">
    <?php require ROOT . '/backend/static/blocks/popUps/popUpUser.php' ?>
    <?php require ROOT . '/backend/static/blocks/popUps/popUpBasket.php' ?>

    <div class="myframe">
    <h6>Местоположение</h6>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2350.8750369444783!2d27.5434329!3d53.898425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfef5296ecab%3A0x7efd3d6c60d18284!2zU0FJTlQgTEFVUkVOVCDjgrXjg7Pjg63jg7zjg6njg7Mg44OQ44Kk44Ok44O8IOODrOOCtuODvCDnm7Tosqkg6ZW36LKh5biDIOiyoeW4gw!5e0!3m2!1sru!2sde!4v1714467153102!5m2!1sru!2sde"
                    width="600"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <hr>
    <div class="myframe">
        <h6>Страница поставщика</h6>
        <p><img src="https://oborot.ru/wp-content/uploads/2020/11/screenshot_48.png" usemap="#sale" width="568" height="351" alt="sale"></p>
        <p><map name="sale">
                <area shape="rect" coords="0,0,568,351" href="https://oborot.ru/wp-content/uploads/2020/11/screenshot_48.png" target="_blank" alt="Откроется в новом окне">
            </map></p>
    </div>
</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>