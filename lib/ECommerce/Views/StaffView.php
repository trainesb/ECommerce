<?php


namespace ECommerce\Views;


use ECommerce\Site;

class StaffView extends View {

    protected $site;

    public function __construct(Site $site) {
        $this->site = $site;

        $this->setTitle("Staff");

        $this->addLink("./cart.php", "Cart");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo "<h1 class='center'>Staff</h1>";
        echo $this->presentSales();
        echo $this->presentSessions();
        echo "</div></div>";
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
}
