<?php

use Core\User;

$user = (new User)->getUserByEmail($_SESSION['user']['email']);

view("profile/index", [
    'heading' => 'Личный кабинет',
    'user' => $user,
    'errors' => []
]);
