<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$note = $db->query('select * from news where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

$errors = [];

if (!Validator::string([$_POST['body']], 1, 1000)) {
    $errors['body'] = '1000 символов - максимум!';
}

if (count($errors)) {
    return view('news/edit', [
        'heading' => 'Редактировать новость',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update news set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

redirect('/news');
