<?php


namespace ECommerce\Views;

use ECommerce\Site;
use ECommerce\Tables\TopCategories;

class View {

    private $title = "";
    private $links = [];    //Links to add to the nav bar
    private $protectRedirect = null;

    public function protect(Site $site, $user) {
        if($user->isStaff()) {
            return true;
        }

        $this->protectRedirect = $site->getRoot() . "/";
        return false;
    }

    public function getProtectRedirect() {
        return $this->protectRedirect;
    }

    public function setTitle($title) { $this->title = $title; }

    public function addLink($href, $text) { $this->links[] = ["href" => $href, "text" => $text]; }

    public function head() {
        return <<<HTML
<meta charset="utf-8">
<title>$this->title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="dist/main.js"></script>
HTML;
    }

    public function nav($site) {
        $html = <<<HTML
<nav>
    <ul class="left">
        <li><a href="./">Business Name (Header)</a></li>
    </ul>
HTML;

        if(count($this->links) > 0) {
            $html .= '<ul class="right">';
            foreach($this->links as $link) {
                $html .= '<li><a href="' .
                    $link['href'] . '">' .
                    $link['text'] . '</a></li>';
            }
            $html .= '</ul>';
        }

        $html .= '</nav>';
        return $html;
    }

    public function sideNav() {
        return <<<HTML
<div class="sideNav">
    <p><a href=".\staff.php">Staff</a></p>
    
    <p class="products"><a href="">Products</a></p>
    <ul class="sub" hidden>
        <li><a href=".\products.php">All Products</a></li>
        <li><a href=".\add-product.php">Add Product</a></li>
        <li><a href=".\product-map.php">Collection Product Map</a></li>
    </ul>
    
    <p class="collections"><a href="">Collections</a></p>
    <ul class="sub" hidden>
        <li><a href=".\collections.php">All Collections</a></li>
        <li><a href=".\add-top-cat.php">Add Top-Collection</a></li>
        <li><a href=".\add-sub-cat.php">Add Sub-Collection</a></li>
        <li><a href=".\map-collections.php">Collections Map</a></li>
    </ul>
    
    <p class="users"><a>Users</a></p>
    <ul class="sub" hidden>
        <li><a href=".\users.php">All Users</a></li>
        <li><a href=".\add-user.php">Add User</a></li>
    </ul>
    
    <p class="warehouses"><a>Warehouses</a></p>
    <ul class="sub" hidden>
        <li><a href=".\ali-express.php">AliExpress</a></li>
    </ul>
   
</div>
HTML;
    }

    public function footer() {
        return <<<HTML
<footer><p>Copyright © 2019 (Business Name). All Rights Reserved.</p></footer>
HTML;
    }
}