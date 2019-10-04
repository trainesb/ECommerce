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

    public function present() {
        echo $this->sideNav();
        echo "<div>";
        echo $this->presentBtns();
        echo $this->presentSales();
        echo $this->presentSessions();
        echo "</div>";
    }

    public function presentSales() {
        return <<<HTML
<div class="sales card">
    <h3>TODAY'S SALES</h3>
    <p>No sales yet</p>
    <hr>
    <p>No orders yet</p>
</div>
HTML;
    }

    public function presentSessions() {
        return <<<HTML
<div class="sessions card">
    <h3>TODAY'S SESSIONS</h3>
    <p>No sessions yet</p>
    <hr>
    <p>No visitors right now</p>
</div>
HTML;
    }

    public function sideNav() {
        return <<<HTML
<div class="sideNav">
    <p><a href="">Home</a></p>
    
    <p class="orders"><a href="">Orders</a></p>
    <ul class="sub" hidden>
        <li><a href="">All Orders</a></li>
        <li><a href="">Drafts</a></li>
        <li><a href="">Abandoned Checkouts</a></li>
    </ul>
    
    <p class="products"><a href="">Products</a></p>
    <ul class="sub" hidden>
        <li><a href="">All Products</a></li>
        <li><a href="">Transfers</a></li>
        <li><a href="">Inventory</a></li>
        <li><a href="">Collections</a></li>
        <li><a href="">Gift Cards</a></li>
    </ul>
    
    <p><a href="">Customers</a></p>
    
    <p class="analytics"><a href="">Analytics</a></p>
    <ul class="sub" hidden>
        <li><a href="">Dashboards</a></li>
        <li><a href="">Reports</a></li>
        <li><a href="">Live View</a></li>
    </ul>
    
    <p><a href="">Discounts</a></p>
</div>
HTML;

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