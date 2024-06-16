<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from news where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

$db->query('delete from news where id = :id', [
    'id' => $_POST['id']
]);

header('location: /news');
exit();
