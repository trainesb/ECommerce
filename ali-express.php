<?php
require 'lib/site.inc.php';

$view = new ECommerce\Views\AliExpressView($site);

if(!$view->protect($site, $user)) {
    header("location: " . $view->getProtectRedirect());
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="staff">
    <?php echo $view->nav($site); ?>

    <button id="ali-test">Ali</button>

    <div id="webContent">

    </div>

    <?php echo $view->footer(); ?>
</body>
</html>
