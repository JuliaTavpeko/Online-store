<?php

namespace backend\classes\reviews;

use backend\classes\database\DatabaseManager;
use backend\classes\database\review\ReviewDB;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Reviews
{

    public function __construct($reviewData, DatabaseManager $dbManager)
    {
        $this->reviewData = $reviewData;
        $this->review = new ReviewDB($dbManager);
    }

    public function makeReview()
    {
        $this->review->insertReview($this->reviewData);
        return $this->reviewData;
    }

    public function getReviewData()
    {
        return $this->review->getReviewData($this->reviewData['id']);
    }

    public function getReviews()
    {
        return $this->review->getReviews($this->reviewData['idProd']);
    }

}