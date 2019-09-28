<?php


namespace ECommerce\Views;


class AddProductView extends View {

    public function __construct() {
        $this->setTitle("Add Product");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("./users.php", "Users");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("./add-top-cat.php", "Add Top");
        $this->addLink("./add-sub-cat", "Add Sub");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
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
}