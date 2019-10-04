<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\Products;

class ProductsView extends View {

    private $site;
    private $products;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->products = new Products($this->site);

        $this->setTitle("All Products");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo $this->products();
        echo "</div></div>";
    }

    public function products() {
        $all = $this->products->getAll();

        $html = <<<HTML
<h1 class='center'>All Products</h1>
<table>
    <tr>
        <th></th>
        <th>SKU</th>
        <th>Title</th>
        <th>Price</th>
        <th>Sold Out</th>
		<th>Description</th>
		<th>Visible</th>
	</tr>
HTML;
        foreach ($all as $product) {
            $sku = $product['sku'];
            $title = $product['title'];
            $price = $product['price'];
            $soldout = $product['soldout'];
            $description = $product['description'];
            $visible = $product['visible'];
            $html .= <<<HTML
		<tr>
			<td><input type="radio" name="product"></td>
			<td>$sku</td>
			<td>$title</td>
			<td>$price</td>
			<td>$soldout</td>
			<td>$description</td>
			<td>$visible</td>
		</tr>
HTML;
        }
        $html .= '</table>';
        return $html;
    }
}