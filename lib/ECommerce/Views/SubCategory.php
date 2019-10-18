<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\ProductImages;
use ECommerce\Tables\Products;

class SubCategory extends View {

    protected $site;
    public function __construct(Site $site, $user) {
        $this->site = $site;
        $this->setTitle("Product");

        if($user) {
            if($user->isStaff()) {
                $this->addLink("./staff.php", "Staff");
            }
            $this->addLink("./cart.php", "Cart");
            $this->addLink("./profile.php", "Profile");
            $this->addLink("./logout,php", "Log Out");
        } else {
            $this->addLink("./cart.php", "Cart");
            $this->addLink("login.php", "Log In");
        }
    }

    public function presentProducts() {
        $prd = new Products($this->site);
        $images = new ProductImages($this->site);
        $all = $prd->getAll();
        $html = "<div class='container'>";
        foreach ($all as $sub) {
            $sku = $sub['sku'];
            $title = $sub['title'];
            $price = $sub['price'];
            $soldout = $sub['soldout'];
            $description = $sub['description'];
            $img = $images->getBySku($sku)[0]['img'];

            if($sub['visible']) {
                $html .= <<<HTML
<div class="prdct-card">
    <h4><b class="product-title">$title</b></h4>
    <img src="$img" alt="SubCategory Image">
    <div class="container">
        <p>$price</p>
        <p class="sku">$sku</p>
        <p>$description</p>
    </div>
</div>
HTML;
            }
        }
        $html .= "</div>";
        return $html;
    }


}
