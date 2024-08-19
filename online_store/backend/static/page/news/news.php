<!DOCTYPE html>
<html>
<head>
    <title> Новости </title>
    <meta charset="utf-8" />

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/user/user.css" rel="stylesheet">
    <link href="css/basket/basket.css" rel="stylesheet">
    <link href="css/news/news_list.css" rel="stylesheet">

    <script src="js/events/user.js" type="module" defer></script>
    <script src="js/events/basket.js" type="module" defer></script>

    <link href="css/user/popUpUser.css" rel="stylesheet">
    <link href="css/basket/popUpBasket.css" rel="stylesheet">

    <script src="js/events/block/popUp/popUpUser.js" defer></script>
    <script src="js/events/block/popUp/popUpBasket.js" type="module" defer></script>

</head>
<?php require ROOT . '/backend/static/blocks/header.php' ?>
<body>
<div class="main">
    <?php require ROOT . '/backend/static/blocks/popUps/popUpUser.php' ?>
    <?php require ROOT . '/backend/static/blocks/popUps/popUpBasket.php' ?>

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
    <br>
    <a href="news.php" style="text-decoration: none; display: flex; justify-content: center; align-items: center;">Смотреть больше</a>
    <hr>
    <div class="myframe">
    <h5>Обзоры</h5>
        <div>
            <iframe
                src="https://www.kp.ru/expert/elektronika/luchshie-smartfony-dlya-videosyomki/" height="500px" width="800px" style="border: none">
            </iframe>
        </div>
    </div>
    <hr>
</div>
</body>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>