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

    <link href="css/user/popUpUser.css" rel="stylesheet">
    <link href="css/basket/popUpBasket.css" rel="stylesheet">

    <script src="js/events/block/popUp/popUpUser.js" defer></script>
    <script src="js/events/block/popUp/popUpBasket.js" type="module" defer></script>
</head>
<?php require ROOT . '/backend/static/blocks/header.php' ?>
<body>
<div class="main">

    <?php require ROOT . '/backend/static/blocks/popUpUser.php' ?>

    <h1>Корзина</h1>
    <div class="basketCont">
        <div class="totalOrder"></div>
        <div class="orderProduct">
            <table>
                <tbody id="basket-items">
                <tr class="basket_item">
                </tr>
                </tbody>
            </table>
            <div>Итого: <span class="total-price"></span> руб.</div>
            <div><button id="openFormButton" class="btnOrder">Заказать</button></div>
        </div>
    </div>

    <form class="order">
        <div class="order-container">
            <h1>Оформление заказа</h1>
            <label>Имя:</label>
            <input type="text" id="user" name="user" class="orderInfo" required/>
            <label>Телефон:</label>
            <input type="text" id="phone" name="phoneClient" class="orderInfo" required/>
            <label>Email:</label>
            <input type="text" id="email" name="emailClient" class="orderInfo" required/>
            <label>Адрес:</label>
            <input type="text" id="address" name="address" class="orderInfo" required/>
            <div class="orderInfo payment" id="payment">
                <label>Наличные</label><input type="checkbox" name="paymentMethod" id="paymentCash" value="cash" checked/>
                <label>Кредитная карта</label><input type="checkbox" name="paymentMethod" id="paymentCreditCard" value="creditCard" />
            </div>
            <button class="makeOrder" >Оформить заказ</button>
        </div>
    </form>
    <script src="https://unpkg.com/imask"></script>
    <script src="js/events/order.js" type="module" defer></script>

</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>