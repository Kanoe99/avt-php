<?php

use Core\User;

(new User())->approveUser($_POST['id']);

header('location: /admin');
exit();
