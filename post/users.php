<?php
require '../lib/site.inc.php';

$controller = new ECommerce\Controllers\UsersController($site, $user, $_POST);
echo $controller->getResult();