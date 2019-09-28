<?php


namespace ECommerce\Views;


use ECommerce\Site;

class StaffView extends View {

    protected $site;

    public function __construct(Site $site) {
        $this->site = $site;

        $this->setTitle("Staff");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function presentBtns() {
        $html = <<<HTML
<div class="staff-btns">
    <p><a href="./user.php">Users</a></p>
    <p><a href="./top-cat.php">Top-Categories</a></p>
    <p><a href="./sub-cat.php">Sub-Categories</a></p>
    <p><a href="./product.php">Products</a></p>
    <p><a href="./categories.php">Category Map</a></p>
    <p><a href="./product-map.php">Product Map</a></p>
</div>
HTML;
        return $html;
    }

}