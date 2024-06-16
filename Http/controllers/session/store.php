<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\User;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$user = (new User)->getUserByEmail($_POST['email']);
$approved = $user['approved'];

$signedIn = (new Authenticator)->attempt(
    $attributes['email'],
    $attributes['password']
);

if (!$signedIn) {
    $form->error(
        'email',
        'Неверные логин или пароль!'
    )->throw();
}

if (!$approved) {
    $form->error(
        'email',
        'Ваш аккаунт ещё не был одобрен!'
    )->throw();
}

redirect('/');
