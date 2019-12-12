<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\SubCategories;
use ECommerce\Tables\TopCategories;
use ECommerce\Tables\TopSubMaps;

class AddCategoryView extends View {

    private $site;
    private $topCategories;
    private $subCategories;
    private $topSubMap;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->subCategories = new SubCategories($this->site);
        $this->topCategories = new TopCategories($this->site);
        $this->topSubMap = new TopSubMaps($this->site);


        $this->setTitle("Add Category");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo $this->collections();
        echo "<div class='right'>";
        echo "<h1 class='center'>Add Category</h1>";
        echo $this->addSub();
        echo "</div></div></div>";
    }

    public function prepareTop() {
        $allTop = $this->topCategories->getAll();
        $html = '';
        foreach ($allTop as $top) {
            $html .= "<option value=".$top['id'].">".$top['name']."</option>";
        }
        return $html;
    }

    public function addSub() {
        $html = <<<HTML
<form id="categories" name="categories">
    <fieldset>
        <legend>Add Category</legend>
        <p>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" placeholder="Name">
        </p>
        <p>
            <label for="category-type">Type:</label>
            <select id="category-type" name="category-type">
                <option value="top">Top</option>
                <option value="sub">Sub</option>
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
        <span class="hidden" hidden>
        <p>
            <label for="parent-cat">Parent Category</label>
            <select id="parent-cat" name="parent-cat">
HTML;
                $html .= $this->prepareTop();
                $html .= <<<HTML
            </select>
        </p>
        </span>
        <p>
            <label for="visible">Visible:</label>
            <select id="visible" name="visible">
                <option value="1">True</option>
                <option value="0">False</option>
            </select>
        </p>
       	<p>
			<input type="submit" value="Add" name="submit">
		</p>
    </fieldset>
</form>
HTML;
                return $html;
    }

    public function collections() {
        $allTop = $this->topCategories->getAll();

        $html = "<div class='categories container left'><ul>";

        foreach ($allTop as $top) {
            $top_id = $top["id"];
            $top_name = $top["name"];
            $html .= "<li>$top_name</li>";

            $sub_ary = $this->topSubMap->getSubFor($top_id);

            if(!empty($sub_ary)) {
                $html .= "<ul>";
                foreach ($sub_ary as $row) {
                    $sub_id = $row['sub_id'];
                    $sub = $this->subCategories->getById($sub_id);
                    $sub_name = $sub['name'];
                    $html .= "<li>$sub_name</li>";
                }
                $html .= "</ul>";
            }

        }
        $html .= "</ul></div>";
        return $html;
    }

}
