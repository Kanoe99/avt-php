<?php

use Core\User;
use Http\Forms\RegisterForm;

$full_name = $_POST['name'] . ' ' . $_POST['surname'] . ' ' . $_POST['patronymic'];

$form = RegisterForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'password_repeat' => $_POST['password_repeat'],
    'full_name' => $full_name
]);

if ((new User)->getUserByEmail($_POST['email'])) {
    $form->error('email', 'Аккаунт с этими данными уже существует!')->throw();
    exit;
}

(new User)->createUser($_POST['email'], $_POST['password'], $full_name);

$message = 'Аккаунт успешно создан, ожидайте подтверждения!';
redirect("/login?message={$message}");
