<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    // Remove query string from the request URI
    $requestUri = strtok($_SERVER['REQUEST_URI'], '?');
    // Compare the request URI without query string with the provided value
    return $requestUri === $value;
}



function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    if (isset($_SESSION['user'])) {
        $user = (new Core\User)->getUserByEmail($_SESSION['user']['email']);
        $email = $_SESSION['user']['email'];
        $image = $user['image'];
        $full_name = $user['full_name'];
    }


    require base_path('views/' . $path . '.view.php');
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}


function imageConfig()
{
    if (isset($_GET['image'])) {
        $image = $_GET['image'] ?? '';
        $image_path = __DIR__ . '/../images/' . $image;
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = pathinfo($image_path, PATHINFO_EXTENSION);

        if (file_exists($image_path) && is_file($image_path) && in_array(strtolower($file_extension), $allowed_extensions)) {
            $mime_type = mime_content_type($image_path);
            header('Content-Type: ' . $mime_type);
            header('Content-Length: ' . filesize($image_path));
            readfile($image_path);
            exit;
        } else {
            http_response_code(404);
            echo "Image not found.";
            exit;
        }
    }
}
