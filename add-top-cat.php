<?php
require 'lib/site.inc.php';
$view = new ECommerce\Views\AddTopCatView($site);

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
<div class="add-top-cat">
    <?php
    echo $view->nav($site);
    echo $view->present();
    echo $view->footer();
    ?>
</body>
</html>
