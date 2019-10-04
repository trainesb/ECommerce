<?php
require '../lib/site.inc.php';
require '../lib/simple_html_dom.php';

$controller = new ECommerce\Controllers\AliExpressController($site, $_POST);
echo $controller->getResult();