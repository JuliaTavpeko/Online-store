<?php

namespace backend\classes\users\auth;
use backend\classes\database\DatabaseManager;
use backend\classes\database\user\User;
use backend\classes\helpers\Validator;
use Exception;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class Authorization {


    public function __construct($userData,DatabaseManager $dbManager)
    {
        $this->userData = $userData;
        $this->user = new User($dbManager);
    }

    public function authenticate(): bool
    {
        if (!$this->userData['loginAuth'])
            return false;

        return $this->user->checkData('login', $this->userData['loginAuth']);
    }

    /**
     * @throws Exception
     */
    public function loginUser(): array|bool
    {
        $user = [];
        try {
            if ($this->validateData() && $this->authenticate() && $this->user->checkData('pass', $this->userData['passAuth'])) {
                if ($this->createSession()) {
                    if (isset($this->userData['checkbox']) && $this->userData['checkbox'] === true) {
                        $user['cookie'] = $this->addToCookie();
                    }
                    $user['session'] = $this->getSession();
                    return array_merge($user, $this->user->getUser($this->userData['loginAuth']));
                }
            }
        } catch (Exception $e) {
            error_log('Не удалось авторизовать пользователя: ' . $e->getMessage());
        }
        return false;
    }

    public function changePass(){
        if ($this->validateData() && $this->authenticate() && !$this->user->checkData('pass', $this->userData['newPass'])) {
            $this->user->updateData($this->userData);
        } elseif($this->user->checkData('pass', $this->userData['newPass'])){
           return 'Password exist';
        }
        return $this->user->getUser($this->userData['loginAuth']);
    }

    public function validateData(): bool
    {
        $rules = [
            'loginAuth' => [
                'required' => true,
                'min' => 3,
                'max' => 60,
            ],

            'passAuth' => [
                'required' => true,
                'min' => 4,
                'max' => 25,
            ],

            'newPass' => [
                'required' => true,
                'min' => 4,
                'max' => 25,
            ],

            'repeatNewPass' => [
                'match' => 'newPass',
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


    private function addToCookie()
    {
        $_COOKIE["loginAuth"] = $this->userData['loginAuth'];
        setcookie("loginAuth", $_COOKIE["loginAuth"], time() + (86400 * 30), "/");
        return $_COOKIE["loginAuth"];
    }

    public function createSession(): bool
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["loginAuth"] = $this->userData['loginAuth'];
        return isset($_SESSION["loginAuth"]);
    }

    public static function deleteSession(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        if (session_destroy()) {
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }
            return true;
        }
        return false;
    }

    public function getSession(): array
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return ['session_id' => session_id()];
    }


}
