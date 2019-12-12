<?php
require '../lib/site.inc.php';

$controller = new ECommerce\Controllers\ProductController($site, $_POST, $_FILES);
echo $controller->getResult();
