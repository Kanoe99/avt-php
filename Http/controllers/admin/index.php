<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$users = $db->query('select * from users where approved = :approved and role = :role', [
    ':approved' => true,
    ':role' => 'user'
])->get();

$not_approved = $db->query('select * from users where approved = :approved', [
    ':approved' => false
])->get();


view("admin/index", [
    'heading' => 'Кабинет админа',
    'users' => $users,
    'not_approved' => $not_approved
]);
