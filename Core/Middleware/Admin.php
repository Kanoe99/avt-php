<?php

namespace Core\Middleware;

use Core\User;

class Admin
{
    protected $user;
    protected $admin;

    public function __construct()
    {

        if (!isset($_SESSION['user'])) {
            $this->user = null;
            $this->admin = false;
            exit();
        }


        $this->user = (new User)->getUserByEmail($_SESSION['user']['email']);

        $this->admin = $this->user && $this->user['role'] === 'admin';
    }

    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }

        if (!$this->admin) {
            header('Location: /');
            exit();
        }
    }
}
