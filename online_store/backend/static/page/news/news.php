<?php require ROOT . '/backend/static/blocks/header.php' ?>

<?php
    use backend\classes\news\News;
    global $db;

    $db_config = require CONFIG . '/db.php';
    $db->getConnection($db_config);

    $news = new News(0, $db);
    $result = $news->getNews();

    $limit = 15;
    $limitedResult = array_slice($result, 0, $limit);

    foreach ($limitedResult as $row) {
        ?>
    <div class="post-wrap">
        <div class="post-item">
            <div class="post-item-wrap">
                <a href="<?php echo 'article.php?article=' . $row["id"] ?>" class="post-link">
                    <img src="data:image/png;base64,<?php echo base64_encode($row["pic"]); ?>" height="315" alt="img1">
                    <div class="post-info">
                        <div class="post-meta">
                            <div class="post-date"><?php echo $row["date"]; ?></div>
                            <div class="post-cat"><?php echo $row["name"]; ?></div>
                        </div>
                        <h3 class="post-title"><?php echo $row["text"]; ?></h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
        <?php
    }
    ?>

<?php require ROOT . '/backend/static/blocks/footer.php' ?>