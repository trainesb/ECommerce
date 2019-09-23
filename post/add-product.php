<?php
require '../lib/site.inc.php';

$controller = new ECommerce\AddProductController($site, $_POST);
echo $controller->getResult();