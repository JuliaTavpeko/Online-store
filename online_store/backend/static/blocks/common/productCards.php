<?php
foreach ($limitedResult as $row) {
    $colorsData = json_decode($row['colors'], true) ?? [];
    $selectedColor = array_key_first($colorsData);
    $currentColorInfo = $colorsData[$selectedColor] ?? null;
    $productImage = $currentColorInfo['photo'] ?? 'data:image/png;base64,' . base64_encode($row['Photo']);

    ?>
    <div class="border photo">
        <div class="wrap">
            <div class="product-wrap">
                <a href=""><img src="<?php echo $productImage; ?>" height="315" alt="img1"></a>
            </div>
            <div class="loop-action">
                <a href="<?php echo 'product.php?prod=' . $row["id"] ?>" class="add-to-cart">Быстрый просмотр</a>
                <a href="" class="loop-add-to-cart">В корзину</a>
            </div>
        </div>
        <div class="product-info">
            <h3 class="product-title"> <?php echo htmlspecialchars($row["Name"]); ?></h3>
            <div class="price"> <?php echo htmlspecialchars($row["Price"]); ?> руб.</div>
        </div>
    </div>
    <?php
}
?>