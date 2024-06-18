<?php

use Core\User;

(new User)->deleteUser($_POST['id']);

redirect('/admin');
