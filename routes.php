<?php
//public routes
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/applicant', 'applicant.php');
$router->get('/student', 'student.php');
$router->get('/teacher', 'teacher.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');



//profile
$router->get('/profile', 'profile/index.php')->only('auth');
$router->patch('/profile', 'profile/update.php')->only('auth');

$router->delete('/session', 'session/destroy.php')->only('auth');


//news for all
$router->get('/news', 'news/index.php')->only('auth');
$router->get('/note', 'news/show.php')->only('auth');

//edit & create news
$router->delete('/note', 'news/destroy.php')->only('admin');
$router->get('/note/edit', 'news/edit.php')->only('admin');
$router->patch('/note', 'news/update.php')->only('admin');
$router->get('/news/create', 'news/create.php')->only('admin');
$router->post('/news', 'news/store.php')->only('admin');


//approve or delete users
$router->get('/admin', 'admin/index.php')->only('admin');
$router->patch('/admin', 'admin/approve.php')->only('admin');
$router->delete('/admin', 'admin/destroy.php')->only('admin');
