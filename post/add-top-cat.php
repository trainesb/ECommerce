<?php
require '../lib/site.inc.php';

$controller = new ECommerce\AddTopCatController($site, $_POST);
echo $controller->getResult();