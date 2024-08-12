<!DOCTYPE html>
<html>
<head>
    <title> Интернет-магазин </title>
    <meta charset="utf-8" />

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/catalog.css" rel="stylesheet">
    <link href="css/table/table.css" rel="stylesheet">
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

<?php require ROOT . '/backend/static/blocks/popUpUser.php' ?>
<?php require ROOT . '/backend/static/blocks/popUpBasket.php' ?>


    <div id="paragraph">
    <h1>Добро пожаловать!</h1>
    <span><b>Мы - ваш идеальный интернет-магазин для всех, кто ищет лучшие смартфоны!</b><br>Наш ассортимент включает в себя самые последние модели телефонов
        от ведущих производителей, обеспечивая высокое качество и надежность.
        <i>Мы гордимся широким выбором товаров, доступными ценами и быстрой доставкой.<br>Приходите к нам и обновите свой мир с последними технологиями в своем кармане!</i></span>
    </div>
    <hr>
    <h2>Новые поступления</h2>

    <?php
    use backend\classes\database\DatabaseManager;
    require dirname(__DIR__) . '/online_store/vendor/autoload.php';

    $db_config = require CONFIG . '/db.php';
    $db = DatabaseManager::getInstance();
    $db->getConnection($db_config);

    $sql = "SELECT * FROM Catalog";
    $result = $db->query($sql)->findAll();

    foreach ($result as $row) {
        ?>
        <div class="border photo">
            <div class="wrap">
                <div class="product-wrap">
                    <a href=""><img src="data:image/png;base64,<?php echo base64_encode($row["Photo"]); ?>" height="315" alt="img1"></a>
                </div>
                <div class="loop-action">
                    <a href="<?php echo 'product.php?prod=' . $row["id"] ?>" class="add-to-cart">Быстрый просмотр</a>
                    <a href="" class="loop-add-to-cart">В корзину</a>
                </div>
            </div>
            <div class="product-info">
                <h3 class="product-title"> <?php echo $row["Name"]; ?></h3>
                <div class="price"> <?php echo $row["Price"]; ?> руб.</div>
            </div>
        </div>
        <?php
    }
    ?>
    <p><a href="#" style="text-decoration: none">Смотреть больше &rarr;</a></p>

    <hr>
<!--
    <h3>Каталог</h3>
        <div class="border photo">
            <div class="wrap">
                <div class="product-wrap">
                    <a href=""><img src="image/jpg/products/4.jpg" height="315" alt="img4"></a>
                </div>
                <div class="loop-action">
                    <a href="" class="add-to-cart">Быстрый просмотр</a>
                    <a href="" class="loop-add-to-cart">В корзину</a>
                </div>
            </div>
            <div class="product-info">
                <h3 class="product-title">Смартфон HONOR Magic V2 16GB/512GB международная версия (черный кожаный)</h3>
                <div class="price">5999 руб</div>
            </div>
        </div>
        <div class="border photo">
            <div class="wrap">
                <div class="product-wrap">
                    <a href=""><img src="image/jpg/products/5.jpg" height="315" alt="img5"></a>
                </div>
                <div class="loop-action">
                    <a href="" class="add-to-cart">Быстрый просмотр</a>
                    <a href="" class="loop-add-to-cart">В корзину</a>
                </div>
            </div>
            <div class="product-info">
                <h3 class="product-title">Смартфон HONOR Magic6 Pro 12GB/512GB международная версия (графитовый черный)</h3>
                <div class="price">3700 руб</div>
            </div>
        </div>


    <p><a href="#" style="text-decoration: none">Смотреть больше &rarr;</a></p>
    <hr>
--->
    <h4>Доставка по стране</h4>
        <div class="delivery">
            <table class="table">
                <thead>
                <tr>
                    <th>Область</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Минская</td>
                    <td>Бесплатно</td>
                </tr>
                <tr>
                    <td>Брестская</td>
                    <td>2 руб</td>
                </tr>
                <tr>
                    <td>Гродненская</td>
                    <td>3 руб</td>
                </tr>
                <tr>
                    <td>Витебская</td>
                    <td>4 руб</td>
                </tr>
                <tr>
                    <td>Могилёвская</td>
                    <td>2 руб</td>
                </tr>
                <tr>
                    <td>Гомельская</td>
                    <td>2 руб</td>
                </tr>
            </table>
        </div>
    <hr>
<!--
    <div class="myframe">
    <h5>Обзоры</h5>
        <div>
            <iframe
                src="https://www.kp.ru/expert/elektronika/luchshie-smartfony-dlya-videosyomki/" height="500px" width="800px" style="border: none">
            </iframe>
        </div>
    </div>
    <hr>

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
-->
</div>

</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>