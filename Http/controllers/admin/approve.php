<?php

use Core\User;

(new User())->approveUser($_POST['id']);

redirect('/admin');
