<?php
require '../lib/site.inc.php';

$controller = new PetPack\UserController($site, $user, $_POST);
header("location: " . $controller->getRedirect());