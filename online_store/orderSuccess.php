<!DOCTYPE html>
<html>
<head>
    <title>Оформление заказа</title>
    <meta charset="utf-8" />

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/user/user.css" rel="stylesheet">
    <link href="css/basket/basket.css" rel="stylesheet">
    <link href="css/order.css" rel="stylesheet">

    <script src="js/events/user.js" type="module" defer></script>
    <script src="js/events/review.js" type="module" defer></script>
    <script src="js/events/order.js" type="module" defer></script>

    <link href="css/user/popUpUser.css" rel="stylesheet">
    <link href="css/basket/popUpBasket.css" rel="stylesheet">

    <script src="js/events/block/popUp/popUpUser.js" defer></script>
    <script src="js/events/block/popUp/popUpBasket.js" type="module" defer></script>

</head>
<?php require ROOT . '/backend/static/blocks/header.php' ?>

<body>

<div class="main">

    <?php require ROOT . '/backend/static/blocks/popUpUser.php' ?>
    <?php require ROOT . '/backend/static/blocks/popUpBasket.php' ?>


<div class="orderSuccess">Заказ №<span data-num-order="0"></span> оформлен</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orderId = localStorage.getItem('currentOrderId');
            const numOrderElement = document.querySelector('.orderSuccess span');
            numOrderElement.setAttribute('data-num-order', orderId);
            numOrderElement.textContent = orderId;

        });
    </script>

</div>

</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>