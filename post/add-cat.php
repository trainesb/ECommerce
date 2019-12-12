<?php
require '../lib/site.inc.php';

$controller = new ECommerce\Controllers\CategoryController($site, $_POST, $_FILES);
echo $controller->getResult();
