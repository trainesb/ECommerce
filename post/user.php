<?php
require '../lib/site.inc.php';

$controller = new Ecommerce\Controllers\UserController($site, $user, $_POST);
header("location: " . $controller->getRedirect());