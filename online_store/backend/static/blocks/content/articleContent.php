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

<article data-prod='<?php echo $json_data; ?>'>
    <span name="priceProd"><?php echo $data['date']; ?></span>
    <p name="name" style="font-size: 20px; font-weight: 500" data-id-prod="<?php echo $page; ?>"><?php echo $data['name']; ?></p>
    <p name="description"><?php echo $data['description']; ?></p>
</article>
