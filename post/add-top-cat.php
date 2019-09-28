<?php
require '../lib/site.inc.php';

$controller = new ECommerce\Controllers\TopCatController($site, $_POST);
echo $controller->getResult();