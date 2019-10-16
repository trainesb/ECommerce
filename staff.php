<?php
require 'lib/site.inc.php';
$view = new ECommerce\Views\StaffView($site);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="staff">
    <?php echo $view->nav($site); ?>

    <?php echo $view->present(); ?>

    <div id="Ali-test">
    </div>

    <?php echo $view->footer(); ?>
</body>
</html>
