<?php
$open = true;
require 'lib/site.inc.php';
$view = new ECommerce\Views\HomeView($site, $user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="mainpage">
    <?php echo $view->nav($site); ?>
    <h1 class="center">Home</h1>
    <?php
    echo $view->presentTop();
    echo $view->footer();
    ?>
</div>

</body>
</html>
