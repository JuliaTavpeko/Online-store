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

<?php require ROOT . '/backend/static/blocks/footer.php' ?>