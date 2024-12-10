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

    <div class="product-wrapper">
        <!-- галерея фото -->
        <article class="product__content">
            <div class="product__gallery">
                <img class="product__gallery-image" src="<?php echo $data['currentColorInfo']['photo']; ?>" alt="img-prod" id="prod-photo">
                <div class="product__gallery-thumbnail">
                    <?php if (!empty($data['additionalImages'])): ?>
                        <?php foreach ($data['additionalImages'] as $image): ?>
                            <img class="product__gallery-thumbnail-img" src="<?php echo $image; ?>" alt="Thumbnail"
                                 onclick="changeImage('<?php echo $image; ?>')">
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Изображения отсутствуют</p>
                    <?php endif; ?>
                </div>
            </div>
        </article>

        <!-- блок с основной информацией -->
        <article class="product__content">
            <div class="product__card">
                <h1 class="product__card-title" data-id-prod="<?php echo $page; ?>"> <?php echo $data['name']; ?></h1>
                <h5 class="product__card-rating"><span><?php echo $data['rating']; ?></span>★ (0)</h5>
                <div class="product__card-color">
                    <p class="product__card-color_title"><?php echo $lang['color']; ?>: <span id="selected-color"><?php echo $selectedColor; ?></span></p>
                    <div class="product__card-color_switcher">
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
                </div>
                <div class="product__card-description">
                    <h5 class="product__card-description_title"><?php echo $lang['description']; ?>:</h5>
                    <p class="product__card-description_info hidden-text"><?php echo $data['description']; ?></p>
                    <span class="product__card-description_btn btn_read-more lazyloaded"><?php echo $lang['seeMore']; ?></span>
                </div>
                <div class="product__card-characteristics hidden-text">
                    <h5 class="product__card-characteristics_title">Коротко о товаре:</h5>
                    <?php require ROOT . '/backend/static/blocks/common/characteristics.php' ?>
                    <span class="product__card-characteristics_btn btn_read-more lazyloaded"><?php echo $lang['seeMore']; ?></span>
                </div>
            </div>
        </article>

        <!-- цена... и магазины -->
        <article class="product__content">

            <!-- цена... -->
            <section class="product__sale block-with-shadow">
                    <p class="product__sale-price"><?php echo $lang['price']; ?>: <span name="priceProd"><?php echo $data['price']; ?></span> руб.</p>
                    <div class="product__sale-quantity">
                        <button class="product__sale-quantity_minus" type="button" name="button">
                            <img src="image/svg/icon/minus.svg" alt="minus" />
                        </button>
                        <input class="product__sale-quantity_input" type="number" data-price="<?php echo $data['price']; ?>"
                               value="1" disabled />
                        <button class="product__sale-quantity_plus" type="button" name="button">
                            <img src="image/svg/icon/plus.svg" alt="plus" />
                        </button>
                    </div>
                    <p><?php echo $lang['courierDelivery']; ?>: <span>7 сентября</span></p>
                    <p><?php echo $lang['pickupPointDelivery']; ?>: <span>7 сентября</span></p>
                    <input class="btn_add_basket" type="submit" value="Добавить в корзину">
            </section>

            <!-- магазины -->
            <section class="product__shops">
                <?php require ROOT . '/backend/static/blocks/common/shops.php' ?>
                <span class="btn_read-more lazyloaded"><?php echo $lang['seeMore']; ?></span>
            </section>

        </article>
    </div>
</div>

<!-- табы и блок с контентом -->
<article class="product__tabs">

    <!-- табы -->
    <section class="product__tabs-menu">
        <?php require ROOT . '/backend/static/blocks/common/productTabs.php' ?>
    </section>

    <!-- контент -->
    <section class="product__tabs-content">
        <div class="product__tabs-description tab-hidden" id="tab-description"><?php echo $data['description']; ?></div>
        <div class="product__tabs-characteristic tab-hidden" id="tab-characteristic">
            <?php require ROOT . '/backend/static/blocks/common/characteristics.php' ?>
        </div>
        <div class="product__tabs-reviews tab-hidden" id="tab-reviews">
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
