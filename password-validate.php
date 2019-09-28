<?php
$open = true;
require 'lib/site.inc.php';
$view = new ECommerce\Views\PasswordValidateView($site, $_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="password">

    <?php
    echo $view->header($site);

    echo $view->present();

    echo $view->footer();
    ?>

</div>

</body>
</html>