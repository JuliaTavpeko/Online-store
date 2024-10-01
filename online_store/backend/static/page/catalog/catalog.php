<?php require ROOT . '/backend/static/blocks/header.php' ?>

    <?php
    use backend\classes\catalog\Catalog;
    global $db;

    $db_config = require CONFIG . '/db.php';
    $db->getConnection($db_config);

    $catalog = new Catalog(0, $db);
    $result = $catalog->getProductsData();

    $limit = 40;
    $limitedResult = array_slice($result, 0, $limit); ?>
    <?php require ROOT . '/backend/static/blocks/common/productCards.php' ?>
    <?php require ROOT . '/backend/static/blocks/common/delivery.php' ?>

<?php require ROOT . '/backend/static/blocks/footer.php' ?>