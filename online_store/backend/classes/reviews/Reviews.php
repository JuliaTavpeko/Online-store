<?php

namespace backend\classes\reviews;

use backend\classes\database\catalog\CatalogDB;
use backend\classes\database\DatabaseManager;
use backend\classes\database\review\ReviewDB;
use backend\classes\helpers\Calculator;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Reviews
{
    public function __construct($reviewData, DatabaseManager $dbManager)
    {
        $this->reviewData = $reviewData;
        $this->review = new ReviewDB($dbManager);
        $this->product = new CatalogDB($dbManager);
    }

    public function makeReview()
    {
        $this->review->insertReview($this->reviewData);
        $this->calculateRating($this->reviewData['idProd']);
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

    public function calculateRating($idProd)
    {
        $ratingData = $this->review->getRatingData($idProd);

        if (isset($ratingData['error'])) {
            return $ratingData;
        }

        return $this->product->setProdRating(Calculator::calculateRating($ratingData), $idProd);
    }

}