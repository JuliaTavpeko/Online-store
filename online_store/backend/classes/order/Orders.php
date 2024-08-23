<?php

namespace backend\classes\order;
use backend\classes\database\DatabaseManager;
use backend\classes\helpers\Validator;
use backend\classes\database\order\OrderDB;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Orders
{
    public function __construct($orderArray, DatabaseManager $dbManager)
    {
        $this->orderArray = $orderArray;
        $this->order = new OrderDB($dbManager);
    }

    public function makeOrder(){
        if($this->validateData()) {
            $this->order->insertOrderIntoDB($this->orderArray);
            return $this->order->getOrderFromDB($this->orderArray['idUser']);
        } else return false;
    }

    public function getOrder(){
        return $this->order->getOrderFromDB($this->orderArray);
    }

    public function validateData(): bool
    {
        $rules = [
            'user' => [
                'required' => true,
                'min' => 3,
                'max' => 60,
            ],
            'phone' => [
                'required' => true,
                'min' => 3,
                'max' => 60,
            ],
            'email' => [
                'required' => true,
                'email' => true,
            ],
            'address' => [
                'required' => true,
                'min' => 10,
                'max' => 100,
            ],
        ];

        $validation = Validator::validate($rules, $this->orderArray);

        if (!$validation->hasErrors()) {
            $_SESSION['success'] = 'OK';
            return true;
        } else {
            $_SESSION['error'] = 'Validation Error';
            return false;
        }
    }

}