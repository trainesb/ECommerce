<?php
require 'lib/site.inc.php';
$view = new ECommerce\Views\StaffView($site);

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
    <?php
    echo $view->nav($site);

    echo $view->present();
    echo $view->footer();
    ?>
</body>
</html>
