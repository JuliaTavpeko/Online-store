<?php

/**
 * @var DatabaseManager $db
 */

use backend\classes\database\DatabaseManager;
require dirname(__DIR__) . '/../../vendor/autoload.php';

$db_config = require CONFIG . '/db.php';
$db = DatabaseManager::getInstance();
$db->getConnection($db_config);

$page = $_GET['prod'];

$sql = "SELECT Name, Description, Price, Photo FROM Catalog WHERE id = '{$page}'";
$result = $db->query($sql)->find();

$title = $result["Name"];
$description = $result["Description"];
$photo = $result["Photo"];
$price = $result["Price"];

?>

<article class="product-container">
    <div class="prod_content left-column">
        <img src="data:image/png;base64,<?php echo base64_encode($photo); ?>" alt="img1" id="prod-photo">
    </div>
    <div class="content center-column">
        <p name="name" style="font-size: 20px; font-weight: 500" data-id-prod="<?php echo $page; ?>">
            <?php echo $title; ?>
        </p>
        <p class="prod-rating"></p>
        <p name="description">
            <?php echo $description; ?>
        </p>
    </div>
    <div class="basket basket_item right-column">
        <p>Цена: <span name="priceProd">
            <?php echo $price; ?>
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
