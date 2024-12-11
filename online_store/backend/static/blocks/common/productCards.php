<div class="cards">
<?php
foreach ($limitedResult as $row) {
    $colorsData = json_decode($row['colors'], true) ?? [];
    $selectedColor = array_key_first($colorsData);
    $currentColorInfo = $colorsData[$selectedColor] ?? null;
    $productImage = $currentColorInfo['photo'] ?? 'data:image/png;base64,' . base64_encode($row['Photo']);

    ?>

        <div class="cards__card">
            <div class="cards__card-image">
                <img src="<?php echo $productImage; ?>" alt="">
            </div>
            <div class="cards__card-detail">
                <span class="cards__card-detail_label">Popular</span>
                <p class="cards__card-detail_title"><?php echo htmlspecialchars($row["Name"]); ?></p>
                <p class="cards__card-detail_description">Description</p>
                <p class="cards__card-detail_price"><?php echo htmlspecialchars($row["Price"]); ?></p>
                <p class="cards__card-detail_btns">
                    <a class="cards__card-detail_btns-detailed" href="<?php echo 'product.php?prod=' . $row["id"] ?>">
                        <?php echo $lang['quickView']; ?>
                    </a>
                    <a class="cards__card-detail_btns-buy" href=""><?php echo $lang['buy']; ?></a>
                </p>
            </div>
        </div>

    <?php
}
?>
</div>