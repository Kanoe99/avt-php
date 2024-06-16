<?php

namespace Core;

use Core\User;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = (new User)->getUserByEmail($email);

        if ($user) {
            if (!$user['approved']) {
                return 'not_approved';
            }

            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'full_name' => $user['full_name'],
                    'role' => $user['role']
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'role' => $user['role']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
