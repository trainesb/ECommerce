<?php


namespace ECommerce;


class AddSubCatView extends View {

    public function __construct() {
        $this->setTitle("Add Sub-Category");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("./users.php", "Users");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("./add-top-cat.php", "Add Top");
        $this->addLink("./add-product.php", "Add Product");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        return <<<HTML
<form id="add-sub-cat" method="post" action="../../post/add-sub-cat.php" enctype="multipart/form-data">
    <fieldset>
        <legend>Sub Category</legend>
        <p>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" placeholder="Name">
        </p>
        <p>
            <label for="description">Description</label><br>
            <textarea id="description" name="description" placeholder="Description..."></textarea>
        </p>
        <p>
            <label for="img">Select Image to upload</label>
            <input type="file" name="uploadImg" id="uploadImg">
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