<div class="card-wrapper">
<?php
foreach ($limitedResult as $row) {
    $colorsData = json_decode($row['colors'], true) ?? [];
    $selectedColor = array_key_first($colorsData);
    $currentColorInfo = $colorsData[$selectedColor] ?? null;
    $productImage = $currentColorInfo['photo'] ?? 'data:image/png;base64,' . base64_encode($row['Photo']);

    ?>

        <div class="product">
            <div class="prod-image">
                <img src="<?php echo $productImage; ?>" alt="">
            </div>
            <div class="prod-details">
                <span>Popular</span>
                <p><?php echo htmlspecialchars($row["Name"]); ?></p>
                <p>
                    Description
                </p>
                <p><?php echo htmlspecialchars($row["Price"]); ?></p>
                <p>
                    <a href="<?php echo 'product.php?prod=' . $row["id"] ?>" class="add-to-cart">
                        <?php echo $lang['quickView']; ?>
                    </a>
                    <a href=""><?php echo $lang['buy']; ?></a>
                </p>
            </div>
        </div>

    <?php
}
?>
</div>