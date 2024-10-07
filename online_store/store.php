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

    <div class="logos">
        <div class="logos-slide">
            <img src="image/png/logos/apple_logo.png" />
            <img src="image/png/logos/huawei_logo.png" />
            <img src="image/png/logos/lenovo_logo.png" />
            <img src="image/png/logos/honor_logo.png" />
            <img src="image/png/logos/infinix_logo.png" />
            <img src="image/png/logos/nokia_logo.png" />
            <img src="image/png/logos/realme_logo.png" />
            <img src="image/png/logos/samsung_logo.png" />
            <img src="image/png/logos/tecno-mobile_logo.png" />
            <img src="image/png/logos/xiaomi_logo.png" />
        </div>
    </div>
    <script src="js/script.js"></script>

<?php require ROOT . '/backend/static/blocks/footer.php' ?>