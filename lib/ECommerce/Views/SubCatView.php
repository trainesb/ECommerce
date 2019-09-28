<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\SubCategories;

class SubCatView extends View {

    private $site;
    private $subCategories;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->subCategories = new SubCategories($this->site);

        $this->setTitle("Add Sub-Category");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo $this->presentSubCategories();
        echo $this->presentAddSub();
    }

    public function presentSubCategories() {
        $all = $this->subCategories->getAll();

        $html = <<<HTML
<table>
    <tr>
        <th></th>
        <th>Name</th>
		<th>Description</th>
		<th>Visible</th>
		<th>Image</th>
	</tr>
HTML;
        if($all) {
            foreach ($all as $sub) {
                $name = $sub['name'];
                $description = $sub['description'];
                $visible = $sub['visible'];
                $image = $sub['img'];
                $html .= <<<HTML
            <tr>
                <td><input type="radio" name="product"></td>
                <td>$name</td>
                <td>$description</td>
                <td>$visible</td>
                <td>$image</td>
            </tr>
HTML;
            }
        }
        $html .= '</table>';
        return $html;
    }


    public function presentAddSub() {
        return <<<HTML
<form id="add-sub-cat" name="add-sub-cat">
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
            <label for="file">Select Image to upload</label>
            <input type="file" id="file" name="file">
        <p>
            <label for="visible">Visible</label>
            <select id="visible" name="visible">
                <option value="1">True</option>
                <option value="0">False</option>
            </select>
        </p>
       	<p>
			<input type="submit" value="Upload Image" name="submit">
		</p>
    </fieldset>
</form>
HTML;
    }

}