<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from news where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

view("news/edit", [
    'heading' => 'Редактировать запись',
    'errors' => [],
    'note' => $note
]);
