<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$news = $db->query('select * from news')->get();

view("news/index", [
    'heading' => 'Новости',
    'news' => $news
]);
