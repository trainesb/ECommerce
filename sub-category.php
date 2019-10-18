<?php
$open = true;
require 'lib/site.inc.php';
$view = new ECommerce\Views\SubCategory($site, $user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="sub-category">
    <?php echo $view->nav($site); ?>
    <h1 class="center">Sub-Category Page</h1>
    <?php
    echo $view->presentProducts();
    echo $view->footer();
    ?>
</div>

</body>
</html>
