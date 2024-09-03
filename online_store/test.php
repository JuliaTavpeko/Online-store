<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Детальная страница товара</title>

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

    <!-- галерея фото -->
    <article>
        <div class="product-gallery">
            <img class="main-image" src="image/jpg/products/1.jpg" alt="img-prod" id="prod-photo" style="max-width: 330px; max-height: 435px;">
            <div class="thumbnail-container">
                <img class="thumbnail" src="image/jpg/products/2.jpg" alt="Thumbnail" onclick="changeImage('image/jpg/products/2.jpg')" style="max-width: 50px; max-height: 50px;">
                <img class="thumbnail" src="image/jpg/products/3.jpg" alt="Thumbnail" onclick="changeImage('image/jpg/products/3.jpg')" style="max-width: 50px; max-height: 50px;">
                <img class="thumbnail" src="image/jpg/products/4.jpg" alt="Thumbnail" onclick="changeImage('image/jpg/products/4.jpg')" style="max-width: 50px; max-height: 50px;">
            </div>
        </div>
    </article>

    <!-- блок с основной информацией -->
    <article>
        <h1 style="max-width: 520px; max-height: 30px;">Название</h1>
        <h5 style="max-width: 275px; max-height: 20px;"><span>4.2</span>★ (3)</h5>
        <p>Цвет: <span>фиолетовый</span></p>
        <div>
            <svg width="25" height="25">
                <circle cx="12.5" cy="12.5" r="10" fill="purple" />
            </svg>
            <svg width="25" height="25">
                <circle cx="12.5" cy="12.5" r="10" fill="black" />
            </svg>
        </div>
        <p style="max-width: 275px; max-height: 20px;">Описание:</p>
        <p style="max-width: 520px; max-height: 100px;">Выразите свою индивидуальность с HONOR Magic V2. Этот смартфон с 16 ГБ оперативной памяти и 512 ГБ встроенной памяти станет вашим надежным помощником в любых задачах. Яркий фиолетовый цвет делает его запоминающимся и стильным, привлекая внимание окружающих. Наслаждайтесь безупречной производительностью и уникальным дизайном, который подчеркнет вашу креативность и оригинальность.
            Приобретите HONOR Magic V2 в нашем интернет-магазине “TechnoWorld” по адресу www.technoworld-shop.com. Мы предлагаем широкий ассортимент и отличное обслуживание. Наш офис находится по адресу: ул. Технологий, д. 5, Минск, Беларусь.Покупайте у нас и получите скидку 10% на первый заказ!</p>
        <button>Читать далее</button>
        <p style="max-width: 275px; max-height: 20px;">Коротко о товаре:</p>
        <ul style="max-width: 520px; max-height: 100px;">
            <li><span>Название</span><span>HONOR Magic6 Pro</span></li>
            <li><span>Память</span><span>12GB оперативной памяти и 512GB встроенной памяти</span></li>
            <li><span>Бренд</span><span>HONOR</span></li>
            <li><span>Операционная система</span><span>Android (международная версия)</span></li>
        </ul>
        <button>Смотреть далее</button>
    </article>

    <!-- цена... и магазины -->
    <article>

        <!-- цена... -->
        <section>
            <div style="max-width: 360px; max-height: 190px;">
                <p>Цена: <span name="priceProd">1000</span> руб.</p>
                <div class="quantity">
                    <button class="minus-btn" type="button" name="button">
                        <img src="image/svg/icon/minus.svg" alt="minus" />
                    </button>
                    <input type="number" class="input_price" data-price="1000" value="1" disabled />
                    <button class="plus-btn" type="button" name="button">
                        <img src="image/svg/icon/plus.svg" alt="plus" />
                    </button>
                </div>
                <p>Доставка курьером:</p>
                <p>Доставка в пункт выдачи:</p>
                <input class="btn_add_basket" type="submit" value="Добавить в корзину">
            </div>
        </section>

        <!-- магазины -->
        <section>
            <div style="max-width: 360px; max-height: 230px;">
            </div>
        </section>

    </article>

    <!-- табы и блок с контентом -->
    <article>

        <!-- табы -->
        <section>
            <div>
                <ul>
                    <li>Описание</li>
                    <li>Характеристики</li>
                    <li>Отзывы</li>
                </ul>
            </div>
        </section>

        <!-- контент -->
        <section>
            <div>
                <p>Магазины</p>
            </div>
        </section>

    </article>









    <script>
        function changeImage(src) {
            document.getElementById('prod-photo').src = src;
        }
    </script>
</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>