<?php
require '../lib/site.inc.php';
$controller = new ECommerce\Controllers\SubCatController($site, $_POST, $_FILES);
echo $controller->getResult();