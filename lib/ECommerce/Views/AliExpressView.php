<?php


namespace ECommerce\Views;


use ECommerce\Scraper;
use ECommerce\Site;

class AliExpressView extends View {


    public function __construct(Site $site) {
        $this->setTitle("Ali Express");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo "<h1 class='center'>Ali Express</h1>";
        echo "</div></div>";
    }

}