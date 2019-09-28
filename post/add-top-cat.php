<?php
require '../lib/site.inc.php';

$controller = new ECommerce\Controllers\AddTopCatController($site, $_POST);
echo $controller->getResult();