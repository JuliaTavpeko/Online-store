<?php require ROOT . '/backend/static/blocks/header.php' ?>

    <h2><?php echo $lang['newArrivals']; ?></h2>
    <?php
    use backend\classes\catalog\Catalog;
    global $db;

    $db_config = require CONFIG . '/db.php';
    $db->getConnection($db_config);

    $catalog = new Catalog(0, $db);
    $result = $catalog->getProductsData();

    $limit = 5;
    $limitedResult = array_slice($result, 0, $limit); ?>
    <?php require ROOT . '/backend/static/blocks/common/productCards.php' ?>
    <p><a href="catalog.php" style="text-decoration: none"><?php echo $lang['seeMore']; ?> &rarr;</a></p>
    <hr>

    <h3><?php echo $lang['catalog']; ?></h3>
    <?php
    $limit = 10;
    $limitedResult = array_slice($result, 0, $limit); ?>
    <?php require ROOT . '/backend/static/blocks/common/productCards.php' ?>
    <p><a href="catalog.php" style="text-decoration: none"><?php echo $lang['seeMore']; ?> &rarr;</a></p>

<?php require ROOT . '/backend/static/blocks/footer.php' ?>