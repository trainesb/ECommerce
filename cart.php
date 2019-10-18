<?php
$open = true;
require 'lib/site.inc.php';
$view = new ECommerce\Views\Cart($site, $user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="cart">
    <?php echo $view->nav($site); ?>

    <h1 class="center">Cart</h1>
    <?php
    echo $view->footer();
    ?>
</div>

</body>
</html>
