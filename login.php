<?php
$open = true;
require 'lib/site.inc.php';
$view = new ECommerce\Views\LoginView($site, $_COOKIE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="login">
    <?php
    echo $view->nav($site);
    echo $view->presentForm();
    echo $view->footer();
    ?>
</div>

</body>
</html>