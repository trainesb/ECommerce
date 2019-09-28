<?php
require '../lib/site.inc.php';

$controller = new ECommerce\Controllers\AddProductController($site, $_POST);
echo $controller->getResult();