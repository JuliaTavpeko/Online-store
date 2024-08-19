<?php

namespace backend\classes\database\review;
use backend\classes\database\DatabaseManager;
use PDOException;
class ReviewDB
{
    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function insertReview($reviewData): bool
    {
        $query = "INSERT INTO Reviews (`idUser`, `idProd`,`rating`, `name`, `message` , `pic`) VALUES (:idUser,:idProd,:rating, :name, :message, :pic)";
        try {
            $this->dbManager->query($query, $reviewData);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function getReviewData($id)
    {
        $query = 'SELECT * FROM Reviews WHERE id = :id';
        try {
            $result = $this->dbManager->query($query, ['id' => $id])->find();
            if ($result['pic']) {
                $result['pic'] = base64_encode($result['pic']);
            }
            return $result;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

    public function getReviews($idProd)
    {
        $query = "SELECT * FROM Reviews WHERE `idProd` = '{$idProd}'";
        try {
            $result = $this->dbManager->query($query)->findAll();
            return $result;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

}