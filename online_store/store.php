<!DOCTYPE html>
<html>
<head>
    <title> Интернет-магазин </title>
    <meta charset="utf-8" />

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/catalog.css" rel="stylesheet">
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

    <h2>Новые поступления</h2>
    <?php
    use backend\classes\catalog\Catalog;
    global $db;

    $db_config = require CONFIG . '/db.php';
    $db->getConnection($db_config);

    $catalog = new Catalog(0, $db);
    $result = $catalog->getProductsData();

    $limit = 5;
    $limitedResult = array_slice($result, 0, $limit);

    foreach ($limitedResult as $row) {
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
    <p><a href="catalog.php" style="text-decoration: none">Смотреть больше &rarr;</a></p>
    <hr>

    <h3>Каталог</h3>
    <?php

    $limit = 10;
    $limitedResult = array_slice($result, 0, $limit);

    foreach ($limitedResult as $row) {
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
    <p><a href="catalog.php" style="text-decoration: none">Смотреть больше &rarr;</a></p>
</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>