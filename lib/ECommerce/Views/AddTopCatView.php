<?php


namespace ECommerce\Views;


class AddTopCatView extends View {

    public function __construct() {
        $this->setTitle("Add Top Category");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("./users.php", "Users");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("./add-sub-cat.php", "Add Sub");
        $this->addLink("./add-product.php", "Add Product");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        return $this->AddTop();

    }

    public function AddTop() {
        return <<<HTML
<form id="add-top-cat">
    <fieldset>
        <legend>Top Category</legend>
        <p>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" placeholder="Name">
        </p>
        <p>
            <label for="description">Description</label><br>
            <textarea id="description" name="description" placeholder="Description..."></textarea>
        </p>
        <p>
            <label for="visible">Visible</label>
            <select id="visible" name="visible">
                <option value="true">True</option>
                <option value="false">False</option>
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