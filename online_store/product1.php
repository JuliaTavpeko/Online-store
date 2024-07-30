<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail page</title>

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/user/user.css" rel="stylesheet">
    <link href="css/basket/basket.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
    <link href="css/reviews.css" rel="stylesheet">
    <link href="css/rating.css" rel="stylesheet">

    <script src="js/events/user.js" type="module" defer></script>
    <script src="js/events/review.js" type="module" defer></script>
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

    <?php require ROOT . '/backend/static/blocks/popUpUser.php' ?>
    <?php require ROOT . '/backend/static/blocks/popUpBasket.php' ?>

    <article class="product-container">
        <div class="prod_content left-column">
            <img src="image/jpg/products/1.jpg" alt="img1" id="prod-photo">
        </div>
        <div class="content center-column">
            <p name="name" style="font-size: 20px; font-weight: 500" data-id-prod="1">Смартфон HONOR Magic6 Pro 12GB/512GB международная версия (шалфейный зеленый)</p>
            <p class="prod-rating"></p>
            <p>
                Текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
                текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
                текст текст текст текст текст текст текст текст текст текст текст текст текст текст
                текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
                текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
            </p>
        </div>
        <div class="basket basket_item right-column">
            <p>Цена: <span name="priceProd">3899 </span>руб. </p>
            <div class="quantity">
                <button class="minus-btn" type="button" name="button">
                    <img src="image/svg/icon/minus.svg" alt="" />
                </button>
                <input type="number" class="input_price" data-price="3899" value="1" disabled />
                <button class="plus-btn" type="button" name="button">
                    <img src="image/svg/icon/plus.svg" alt="" />
                </button>
            </div>
            <input class="btn_add_basket" type="submit" value="Добавить в корзину">
        </div>
    </article>
    <h1 style="text-align: center">Отзывы</h1>
    <div class="reviews-list"></div>
    <script>
        $('.reviews-list').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            centerMode: true,
            variableWidth: true
        });
    </script>
    <div class="reviews">
        <form class="decor" name="review">
            <div class="form-inner">
                <h3>Оставить отзыв</h3>
                <img src="image/png/user/noUser.png" id="photo-user" class="photoUser" style="
                                background-color: white;
                                border-radius: 50%;
                                padding: 10px;
                                display: block;
                                margin: 5px auto;" alt="photo-user"/>
                <div class="ratings-wrapper ozenka">
                    <p>Оценка: </p>
                    <div class="ratings">
                        <span data-rating="5">★</span>
                        <span data-rating="4">★</span>
                        <span data-rating="3">★</span>
                        <span data-rating="2">★</span>
                        <span data-rating="1">★</span>
                    </div>
                </div>
                <input type="text" class="reviewerName" placeholder="Имя" name="name">
                <script src="js/events/rating.js"></script>
                <textarea placeholder="Сообщение..." class="reviewerMsg" name="message" rows="3"></textarea>
                <input type="submit" name="submit" value="Отправить">
            </div>
        </form>
    </div>
</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>