<?php
require '../lib/site.inc.php';
$controller = new ECommerce\Controllers\AddSubCatController($site, $_POST, $_FILES);
echo $controller->getResult();