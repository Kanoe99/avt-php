<?php

use Core\User;

(new User)->deleteUser($_POST['id']);

header('location: /admin');
exit();
