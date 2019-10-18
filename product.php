<?php
require 'lib/site.inc.php';
$view = new ECommerce\Views\Product($site, $user);

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
<div class="product">
    <?php
    echo $view->nav($site);
    echo $view->presentProduct();
    echo $view->footer();
    ?>
</div>
</body>
</html>
