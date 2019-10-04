<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\TopCategories;

class AddTopCatView extends View {

    private $site;
    private $topCategories;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->topCategories = new TopCategories($this->site);

        $this->setTitle("Add Top Category");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo "<h1 class='center'>Add Top-Category</h1>";
        echo $this->addTop();
        echo "</div></div>";
    }



    public function addTop() {
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