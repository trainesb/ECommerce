<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\Products;

class ProductView extends View {

    private $site;
    private $products;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->products = new Products($this->site);

        $this->setTitle("Add Product");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo $this->presentProducts();
        echo $this->presentAddProduct();
    }

    public function presentAddProduct() {
        return <<<HTML
<form id="add-product" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Product</legend>
        <p>
            <label for="sku">Sku</label><br>
            <input type="text" id="sku" name="sku" placeholder="sku">
        </p>
        <p>
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" placeholder="Title">
        </p>
        <p>
            <label for="price">Price</label><br>
            <input type="text" id="price" name="price" placeholder="Price">
        </p>
        <p>
            <label for="sold-out">Sold Out</label>
            <select id="sold-out" name="sold-out">
                <option value="1">True</option>
                <option value="0">False</option>
            </select>
        </p>
        <p>
            <label for="description">Description</label><br>
            <textarea id="description" name="description" placeholder="Description..."></textarea>
        </p>
        <p>
            <label for="visible">Visible</label>
            <select id="visible" name="visible">
                <option value="1">True</option>
                <option value="0">False</option>
            </select>
        </p>
       	<p>
			<input type="submit" value="OK">
		</p>
    </fieldset>
</form>
HTML;
    }

    public function presentProducts() {
        $all = $this->products->getAll();

        $html = <<<HTML
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