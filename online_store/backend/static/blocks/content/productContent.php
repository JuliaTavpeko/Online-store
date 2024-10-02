<?php

use backend\classes\catalog\Catalog;

global $db;

$db_config = require CONFIG . '/db.php';
$db->getConnection($db_config);

$page = $_GET['prod'];
$selectedColor = $_GET['color'] ?? null;

$catalog = new Catalog($page, $db);
$result = $catalog->getProductData();

$colorsData = json_decode($result['colors'], true) ?? [];

if (!$selectedColor && !empty($colorsData)) {
    $selectedColor = array_key_first($colorsData);
}

$currentColorInfo = $colorsData[$selectedColor] ?? null;
$additionalImages = $currentColorInfo['additionalImages'] ?? [];

$data = [
    'id' => $page,
    'name' => $result["Name"],
    'description' => $result["Description"],
    'price' => $result["Price"],
    'rating' => $result["Rating"],
    'additionalImages' => $additionalImages,
    'currentColorInfo' => $currentColorInfo,
    'colors' => $colorsData,
    'selectedColor' => $selectedColor,
];

$json_data = json_encode($data);

?>

<div class="product-container" data-prod='<?php echo $json_data; ?>'>

    <!-- галерея фото -->
    <article class="block-content" style="width: 350px; height: 480px;">
        <div class="product-gallery">
            <img class="main-image" src="<?php echo $data['currentColorInfo']['photo']; ?>" alt="img-prod" id="prod-photo">
            <div class="thumbnail-container">
                <?php if (!empty($data['additionalImages'])): ?>
                    <?php foreach ($data['additionalImages'] as $image): ?>
                        <img class="thumbnail" style="max-width: 50px; max-height: 50px;" src="<?php echo $image; ?>" alt="Thumbnail"
                             onclick="changeImage('<?php echo $image; ?>')">
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Изображения отсутствуют</p>
                <?php endif; ?>
            </div>
        </div>
    </article>

    <!-- блок с основной информацией -->
    <article class="block-content" style="max-width: 535px; max-height: 480px;">
        <h1 style="max-width: 520px; word-wrap: break-word; text-align: left" data-id-prod="<?php echo $page; ?>"> <?php echo $data['name']; ?></h1>
        <h5 style="max-width: 275px; max-height: 20px;"><span><?php echo $data['rating']; ?></span>★ (0)</h5>
        <p><?php echo $lang['color']; ?>: <span id="selected-color"><?php echo $selectedColor; ?></span></p>
        <div class="prod-colors">
            <?php if (!empty($data['colors'])): ?>
                <?php foreach ($data['colors'] as $color => $colorInfo): ?>
                    <svg width="25" height="25" onclick="selectColor('<?php echo $color; ?>')">
                        <circle cx="12.5" cy="12.5" r="10" fill="<?php echo $color; ?>" />
                    </svg>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Цвета отсутствуют</p>
            <?php endif; ?>
        </div>
        <div class="description">
            <h5 style="max-width: 275px; max-height: 20px;"><?php echo $lang['description']; ?>:</h5>
            <p style="max-width: 520px; max-height: 100px;" class="hidden-text"><?php echo $data['description']; ?></p>
            <span class="read-more lazyloaded"><?php echo $lang['seeMore']; ?></span>
        </div>
        <div class="characteristics hidden-text">
            <h5 style="max-width: 275px; max-height: 20px;">Коротко о товаре:</h5>
            <?php require ROOT . '/backend/static/blocks/common/characteristics.php' ?>
            <span class="read-more lazyloaded"><?php echo $lang['seeMore']; ?></span>
        </div>
    </article>

    <!-- цена... и магазины -->
    <article class="block-content" style="max-width: 380px; max-height: 480px;">

        <!-- цена... -->
        <section class="block-with-shadow" style="max-width: 360px; max-height: 245px;">
            <div class="basket basket_item prod-cost" >
                <p><?php echo $lang['price']; ?>: <span name="priceProd"><?php echo $data['price']; ?></span> руб.</p>
                <div class="quantity">
                    <button class="minus-btn" type="button" name="button">
                        <img src="image/svg/icon/minus.svg" alt="minus" />
                    </button>
                    <input type="number" class="input_price" data-price="<?php echo $data['price']; ?>"
                           value="1" disabled />
                    <button class="plus-btn" type="button" name="button">
                        <img src="image/svg/icon/plus.svg" alt="plus" />
                    </button>
                </div>
                <p><?php echo $lang['courierDelivery']; ?>: <span>7 сентября</span></p>
                <p><?php echo $lang['pickupPointDelivery']; ?>: <span>7 сентября</span></p>
                <input class="btn_add_basket" type="submit" value="Добавить в корзину">
            </div>
        </section>

        <!-- магазины -->
        <section class="shops" style="max-width: 360px; max-height: 230px;">
            <?php require ROOT . '/backend/static/blocks/common/shops.php' ?>
            <span class="read-more-shops lazyloaded"><?php echo $lang['seeMore']; ?></span>
        </section>

    </article>
</div>

<!-- табы и блок с контентом -->
<article style="max-width: 100%;">

    <!-- табы -->
    <section style="max-width: 515px; max-height: 45px;">
        <?php require ROOT . '/backend/static/blocks/common/productTabs.php' ?>
    </section>

    <!-- контент -->
    <section>
        <div id="tab-description" class="tab-hidden" style="font-size: 14px; margin-left: 40px"><?php echo $data['description']; ?></div>
        <div id="tab-characteristic" class="tab-hidden" style="font-size: 14px; margin-left: 40px">
            <?php require ROOT . '/backend/static/blocks/common/characteristics.php' ?>
        </div>
        <div id="tab-reviews" class="tab-hidden">
            <div class="reviews-list"></div>
        </div>
    </section>

</article>



<script>
    function changeImage(src) {
        document.getElementById('prod-photo').src = src;
    }

    function selectColor(color) {
        const url = new URL(window.location.href);
        url.searchParams.set('color', color);
        window.history.pushState({}, '', url);
        document.getElementById('selected-color').textContent = color;
        location.reload();
    }

</script>
