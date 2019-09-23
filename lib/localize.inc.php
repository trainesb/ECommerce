<?php

return function (ECommerce\Site $site) {

    // Set the time zone
    date_default_timezone_set('America/Detroit');
    $site->setEmail('trainesben68@gmail.com');
    $site->setRoot('/ecommerce');
    $site->dbConfigure('mysql:host=localhost;dbname=ecommerce','root','','');
};