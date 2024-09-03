<?php

use backend\classes\catalog\Catalog;

global $db;

$db_config = require CONFIG . '/db.php';
$db->getConnection($db_config);

$page = $_GET['prod'];

$catalog = new Catalog($page, $db);
$result = $catalog->getProductData();

$charac = new Catalog($page, $db);
$characData = $charac->getProductCharac();
$additionalImages = explode('!', $characData['additionalImages']);

$data = [
    'id' => $page,
    'name' => $result["Name"],
    'description' => $result["Description"],
    'photo' => 'data:image/png;base64,' . $result["Photo"],
    'price' => $result["Price"],
    'rating' => $result["Rating"],
    'additionalImages' => $additionalImages,
    'styleName' => $characData["styleName"],
    'memoryStorage' => $characData["memoryStorage"],
    'brand' => $characData["brand"],
    'operatingSystem' => $characData["operatingSystem"],
];

$json_data = json_encode($data);

?>

<article class="product-container" data-prod='<?php echo $json_data; ?>'>
    <div class="product-gallery">
        <img class="main-image" src="<?php echo $data['photo']; ?>" alt="img-prod" id="prod-photo">
        <div class="thumbnail-container">
            <?php foreach ($data['additionalImages'] as $image): ?>
            <img class="thumbnail" src="<?php echo $image; ?>" alt="Thumbnail" onclick="changeImage('<?php echo $image; ?>')">
            <?php  endforeach; ?>
        </div>
    </div>
    <div class="content center-column">
        <p name="name" style="font-size: 20px; font-weight: 500" data-id-prod="<?php echo $page; ?>">
            <?php echo $data['name']; ?>
        </p>
        <p class="prod-rating"><?php echo $data['rating']; ?>★</p>
    </div>
    <div class="basket basket_item right-column">
        <p>Цена: <span name="priceProd">
            <?php echo $data['price']; ?>
        </span> руб. </p>
        <div class="quantity">
            <button class="minus-btn" type="button" name="button">
                <img src="image/svg/icon/minus.svg" alt="minus" />
            </button>
            <input type="number" class="input_price" data-price="<?php echo $data['price']; ?>" value="1" disabled />
            <button class="plus-btn" type="button" name="button">
                <img src="image/svg/icon/plus.svg" alt="plus" />
            </button>
        </div>
        <input class="btn_add_basket" type="submit" value="Добавить в корзину">
    </div>
</article>

<div>
    <ul>
        <li class="tab" data-tab="tab-description">Описание</li>
        <li class="tab" data-tab="tab-characteristic">Характеристики</li>
    </ul>
</div>
<div id="tab-description" class="tab-hidden"><?php echo $data['description']; ?></div>
<div id="tab-characteristic" class="tab-hidden">
        <ul class="dotted">
            <li><span>Название</span><span><?php echo $data['styleName']; ?></span></li>
            <li><span>Память</span><span><?php echo $data['memoryStorage']; ?></span></li>
            <li><span>Бренд</span><span><?php echo $data['brand']; ?></span></li>
            <li><span>Операционная система</span><span><?php echo $data['operatingSystem']; ?></span></li>
        </ul>
</div>
<script>
    function changeImage(src) {
        document.getElementById('prod-photo').src = src;
    }
</script>
