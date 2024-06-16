<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\User;

$db = App::resolve(Database::class);


$user = (new Core\User)->getUserByEmail($_SESSION['user']['email']);

$errors = [];

if (!Validator::string([$_POST['name'], $_POST['surname'], $_POST['patronymic']], 1, 1000)) {
    $errors['fields'] = 'Заполните все поля!';
}

if (count($errors)) {
    return view('profile', [
        'heading' => 'Личный кабинет',
        'errors' => $errors,
        'user' => $user
    ]);
}

$full_name = $_POST['name'] . " " .  $_POST['surname'] . " " . $_POST['patronymic'];

$db->query('update users set full_name = :full_name, image = :image where email = :email', [
    ':full_name' => $full_name,
    ':image' => $_FILES['image']['name'],
    'email' => $user['email']
]);

$image = $_FILES['image']['name'];
$tmpName = $_FILES['image']['tmp_name'];


if (isset($image) && !empty($image)) {
    $folder = "C:\OSPanel\domains\avt-php\public\../" .  (new User)->getFolderByEmail($_SESSION['user']['email']);

    $originalFileName = basename($_FILES['image']['name']);

    $targetFilePath = $folder . $originalFileName;



    move_uploaded_file($tmpName, $targetFilePath);
}

redirect('/profile');
