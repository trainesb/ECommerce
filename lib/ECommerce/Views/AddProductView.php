<?php


namespace ECommerce\Views;

use ECommerce\Site;
use ECommerce\Tables\Products;

class AddProductView extends View {

    private $site;
    private $products;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->products = new Products($this->site);

        $this->setTitle("Add Product");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo $this->addProduct();
        echo "</div></div>";
    }

    public function addProduct() {
        return <<<HTML
<h1 class="center">Add Product</h1>
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
                <option value="0">False</option>
                <option value="1">True</option>
            </select>
        </p>
        <p>
            <label for="description">Description</label><br>
            <textarea id="description" name="description" placeholder="Description..."></textarea>
        </p>
        <p>
            <label for="file">Select Image to Upload</label>
            <input type="file" id="file" name="file">
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


}
