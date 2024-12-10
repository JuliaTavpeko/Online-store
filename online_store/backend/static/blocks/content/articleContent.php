<?php

use backend\classes\news\News;

global $db;

$db_config = require CONFIG . '/db.php';
$db->getConnection($db_config);

$page = $_GET['article'];

$news = new News($page, $db);
$result = $news->getNewsData();

$data = [
    'id' => $page,
    'name' => $result["name"],
    'description' => $result["description"],
    'date' => $result["date"],
    'pic' => $result["pic"],
];

$json_data = json_encode($data);

?>

<article class="article" data-prod='<?php /*echo $json_data; */?>'>
    <div class="article__date">
        <span><?php echo $data['date']; ?></span>
    </div>
    <div class="article__content">
        <div class="article__content-title">
            <p data-id-prod="<?php echo $page; ?>"><?php echo $data['name']; ?></p>
        </div>
        <div class="article__content-description">
            <p name="description"><?php echo $data['description']; ?></p>
        </div>
        <div class="article__content-image">
            <img src="data:image/png;base64,<?php echo base64_encode($data["pic"]); ?>" />
        </div>
    </div>

    <div class="article__newsletter">
        <h3 class="article__newsletter-title">Подпишитесь на рассылку и получайте свежие новости первыми!</h3>
        <p class="article__newsletter-description">Подписываясь на нашу рассылку новостей, вы даете согласие на получение актуальной информации о наших акциях,
            новинках и событиях. Мы ценим вашу конфиденциальность и гарантируем, что ваши данные будут использованы только
            для этой цели. Вы всегда сможете отказаться от рассылки в любое время. Спасибо за интерес к нашим новостям!
        </p>
        <form class="article__newsletter-form" action="#">
            <input type="email" name="emailNews" id="emailNews" placeholder="Введите email" autocomplete="off">
            <input type="submit" value="Подписаться">
        </form>
    </div>

</article>