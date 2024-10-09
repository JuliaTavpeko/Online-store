<?php require ROOT . '/backend/static/blocks/header.php' ?>

<div class="news-container">
    <div class="news-section">
        <div class="news-title">
            <h2>Свежие новости и обновления</h2>
            <p>Добро пожаловать на страницу новостей нашего интернет-магазина!<br>
                Здесь вы найдете самую актуальную информацию о наших новых поступлениях, специальных предложениях,
                акциях и многом другом.<br>
                Следите за обновлениями, чтобы быть в курсе всех новинок и выгодных предложений!</p>
        </div>
        <div class="news-cards">
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
                <div class="news-card">
                    <div class="news-image">
                        <img src="data:image/png;base64,<?php echo base64_encode($row["pic"]); ?>" />
                    </div>
                    <div class="news-content">
                        <h4><?php echo $row["name"]; ?></h4>
                        <p><?php echo $row["text"]; ?></p>
                        <a href="<?php echo 'article.php?article=' . $row["id"] ?>">Читать</a>
                    </div>
                    <div class="news-posted-data">
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