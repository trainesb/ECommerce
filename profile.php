<?php
require 'lib/site.inc.php';
$view = new ECommerce\ProfileView($user);
if($user->isStaff()) {
    $view->addLink("staff.php", "Staff");
    $view->addLink("users.php", "Users");
}
$view->addLink("post/logout.php", "Log Out");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="staff">
    <?php
    echo $view->header($site);
    echo $view->present();
    echo $view->footer();
    ?>
</body>
</html>
