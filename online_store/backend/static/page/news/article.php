<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Детальная страница новости</title>

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

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</head>
<?php require ROOT . '/backend/static/blocks/header.php' ?>
<body>
<div class="main">
    <?php require ROOT . '/backend/static/blocks/popUps/popUpUser.php' ?>
    <?php require ROOT . '/backend/static/blocks/popUps/popUpBasket.php' ?>
    <?php require ROOT . '/backend/static/blocks/content/articleContent.php' ?>
</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>