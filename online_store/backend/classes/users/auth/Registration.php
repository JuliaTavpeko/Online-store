<?php

namespace backend\classes\users\auth;
use backend\classes\database\DatabaseManager;
use backend\classes\helpers\Validator;
use backend\classes\database\user\User;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class Registration {

    public function __construct($userData,DatabaseManager $dbManager)
    {
        $this->userData = $userData;
        $this->user = new User($dbManager);
    }

    public function registerUser(){
        if($this->isUserExist()){
            return 'Error, user exist';
        } elseif($this->validateData()) {
            $this->user->insertUserIntoDB($this->userData);
            return 'Create user';
        } else {
            return 'Error create user';
        }
    }

    public function isUserExist(): bool
    {
        if(!$this->userData['login'] || !$this->userData['email'])
            return false;

        return $this->user->checkData('login', $this->userData['login']) || $this->user->checkData('email', $this->userData['email']);
    }

    public function validateData(): bool
    {
        $rules = [
            'login' => [
                'required' => true,
                'min' => 3,
                'max' => 60,
            ],
            'email' => [
                'required' => true,
                'email' => true,
            ],
            'pass' => [
                'required' => true,
                'min' => 4,
                'max' => 25,
            ],
            'passRepeat' => [
                'match' => 'pass',
            ],
        ];
        $validation = Validator::validate($rules, $this->userData);

        if (!$validation->hasErrors()) {
            $_SESSION['success'] = 'OK';
            return true;
        } else {
            $_SESSION['error'] = 'Validation Error';
            return false;
        }
    }
}
