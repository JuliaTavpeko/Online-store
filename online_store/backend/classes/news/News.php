<?php

namespace backend\classes\news;

use backend\classes\database\DatabaseManager;
use backend\classes\database\news\NewsDB;

require_once __DIR__ . '/../../../vendor/autoload.php';

class News
{

    public function __construct($idNews, DatabaseManager $dbManager)
    {
        $this->idNews = $idNews;
        $this->news = new NewsDB($dbManager);
    }

    public function getNewsData()
    {
        return $this->news->getNewsFromDB($this->idNews);
    }

    public function getNews()
    {
        return $this->news->getNews();
    }

}