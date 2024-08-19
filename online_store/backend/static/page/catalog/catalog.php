<!DOCTYPE html>
<html>
<head>
    <title> Каталог </title>
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

    <?php require ROOT . '/backend/static/blocks/popUps/popUpUser.php' ?>
    <?php require ROOT . '/backend/static/blocks/popUps/popUpBasket.php' ?>

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
</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>