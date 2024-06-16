<?php

use Core\ValidationException;

use Core\Session;
use Core\User;

const BASE_PATH = __DIR__ . '/../';

session_start();

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require BASE_PATH . 'Core/functions.php';

imageConfig();

require BASE_PATH . 'bootstrap.php';

$router = new \Core\Router();
require BASE_PATH . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

if (isset($_SESSION['user'])) {
    $user = (new User)->getUserByEmail($_SESSION['user']['email']);

    $image = $user['image'];
    $full_name = $user['full_name'];
}



try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}
Session::unflash();
