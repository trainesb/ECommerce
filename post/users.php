<?php
require '../lib/site.inc.php';

$controller = new ECommerce\UsersController($site, $user, $_POST);
echo $controller->getResult();