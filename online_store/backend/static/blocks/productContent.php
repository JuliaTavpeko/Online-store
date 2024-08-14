<?php

use backend\classes\catalog\Catalog;

global $db;

$db_config = require CONFIG . '/db.php';
$db->getConnection($db_config);

$page = $_GET['prod'];

$catalog = new Catalog($page, $db);
$result = $catalog->getProductData();

$data = [
    'id' => $page,
    'name' => $result["Name"],
    'description' => $result["Description"],
    'photo' => 'data:image/png;base64,' . $result["Photo"],
    'price' => $result["Price"]
];

$json_data = json_encode($data);

?>

<article class="product-container" data-prod='<?php echo $json_data; ?>'>
    <div class="prod_content left-column">
        <img src="<?php echo $data['photo']; ?>" alt="img-prod" id="prod-photo">
    </div>
    <div class="content center-column">
        <p name="name" style="font-size: 20px; font-weight: 500" data-id-prod="<?php echo $page; ?>">
            <?php echo $data['name']; ?>
        </p>
        <p class="prod-rating"></p>
        <p name="description">
            <?php echo $data['description']; ?>
        </p>
    </div>
    <div class="basket basket_item right-column">
        <p>Цена: <span name="priceProd">
            <?php echo $data['price']; ?>
        </span> руб. </p>
        <div class="quantity">
            <button class="minus-btn" type="button" name="button">
                <img src="image/svg/icon/minus.svg" alt="minus" />
            </button>
            <input type="number" class="input_price" data-price="3899" value="1" disabled />
            <button class="plus-btn" type="button" name="button">
                <img src="image/svg/icon/plus.svg" alt="plus" />
            </button>
        </div>
        <input class="btn_add_basket" type="submit" value="Добавить в корзину">
    </div>
</article>
