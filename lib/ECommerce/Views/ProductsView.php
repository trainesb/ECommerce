<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\ProductImages;
use ECommerce\Tables\Products;

class ProductsView extends View {

    private $site;
    private $products;
    private $imgs;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->products = new Products($this->site);
        $this->imgs = new ProductImages($site);

        $this->setTitle("All Products");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo $this->products();
        echo $this->images();
        echo "</div></div>";
    }

    public function images() {
        $all = $this->imgs->getAll();

        $html = <<<HTML
<h1 class="center">Images</h1>
<table>
    <tr>
        <th></th>
        <th>SKU</th>
        <th>Image</th>
    </tr>
HTML;
        foreach ($all as $imgs) {
            $sku = $imgs['sku'];
            $img = $imgs['img'];
            $html .= <<<HTML
<tr>
<td><input type="radio" name="product_img"></td>
<td>$sku</td>
<td>$img</td>
</tr>
HTML;
        }

        $html .= "</table>";
        return $html;
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
            $soldout = "false";
            if($product['soldout'] === "1") {
                $soldout = "true";
            }
            $description = $product['description'];
            $visible = "true";
            if($product['visible'] === "0") {
                $visible = "false";
            }
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
