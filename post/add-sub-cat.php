<?php
require '../lib/site.inc.php';

$controller = new ECommerce\AddSubCatController($site, $_POST, $_FILES);
echo $controller->getResult();