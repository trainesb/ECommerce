<?php


namespace ECommerce\Views;


use ECommerce\Scraper;
use ECommerce\Site;

class AliExpressView extends View {

    private $scrapper;

    public function __construct(Site $site) {
        $this->scrapper = new Scraper();

        $this->setTitle("Ali Express");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo "<h1 class='center'>Ali Express</h1>";
        echo $this->categories();
        echo "</div></div>";
    }

    public function categories() {
        $all = $this->scrapper->stripCat();
        $html = "";
        foreach ($all as $cat) {
            $html .= $cat . "<br>";
        }
        return $html;
    }
}