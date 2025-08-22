<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password){
        $user = App::getContainer()->resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user){
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
        session_regenerate_id(true);
    }

    public function logout(){
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}