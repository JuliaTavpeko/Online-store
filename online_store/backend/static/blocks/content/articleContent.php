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
    'date' => $result["date"]
];

$json_data = json_encode($data);

?>

<article data-prod='<?php /*echo $json_data; */?>'>
    <div class="data-release">
        <span><?php echo $data['date']; ?></span>
    </div>
    <div class="content-release">
        <div class="title-release">
            <p data-id-prod="<?php echo $page; ?>"><?php echo $data['name']; ?></p>
        </div>
        <div class="description-release">
            <p name="description"><?php echo $data['description']; ?></p>
        </div>
    </div>
</article>