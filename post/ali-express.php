<?php
require '../lib/site.inc.php';

$controller = new ECommerce\Controllers\AliExpressController($site, $_POST);
echo $controller->getResult();