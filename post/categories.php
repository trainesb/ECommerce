<?php
require '../lib/site.inc.php';

$controller = new ECommerce\Controllers\TopSubMapController($site, $_POST);
echo $controller->getResult();