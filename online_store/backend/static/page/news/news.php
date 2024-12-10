<?php require ROOT . '/backend/static/blocks/header.php' ?>

<div class="news news-container">
    <div class="news__section">
        <div class="news__section-greeting">
            <h2 class="news__section-title">Свежие новости и обновления</h2>
            <p class="news__section-description">
                Добро пожаловать на страницу новостей нашего интернет-магазина!<br>
                Здесь вы найдете самую актуальную информацию о наших новых поступлениях, специальных предложениях,
                акциях и многом другом.<br>
                Следите за обновлениями, чтобы быть в курсе всех новинок и выгодных предложений!
            </p>
        </div>
        <div class="news__section-cards">
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
                <div class="news__section-card">
                    <div class="news__section-card-image">
                        <img src="data:image/png;base64,<?php echo base64_encode($row["pic"]); ?>" />
                    </div>
                    <div class="news__section-card-content">
                        <h4 class="news__section-card-content_title"><?php echo $row["name"]; ?></h4>
                        <p class="news__section-card-content_desc"><?php echo $row["text"]; ?></p>
                        <a class="news__section-card-content_btn" href="<?php echo 'article.php?article=' . $row["id"] ?>">Читать</a>
                    </div>
                    <div class="news__section-card-date">
                        <p><?php echo $row["date"]; ?></p>
                    </div>
                </div>
            <?php
        }
    ?>
        </div>
    </div>
</div>

<?php require ROOT . '/backend/static/blocks/footer.php' ?>