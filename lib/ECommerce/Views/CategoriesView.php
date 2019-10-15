<?php


namespace ECommerce\Views;


use ECommerce\Tables\SubCategories;
use ECommerce\Tables\TopCategories;
use ECommerce\Tables\TopSubMaps;

class CategoriesView extends View {

    private $site;
    private $topCategories;
    private $subCategories;
    private $topSubMap;

    public function __construct($site) {
        $this->site = $site;
        $this->topSubMap = new TopSubMaps($this->site);
        $this->topCategories = new TopCategories($this->site);
        $this->subCategories = new SubCategories($this->site);

        $this->setTitle("All Categories");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo "<h1 class='center'>All Categories</h1>";
        echo $this->collections();
        echo $this->topCategories();
        echo "<br>";
        echo $this->subCategories();
        echo "</div></div>";
    }

    public function collections() {
        $allTop = $this->topCategories->getAll();

        $html = "<div class='categories container'><ul>";

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

    public function topCategories() {
        $all = $this->topCategories->getAll();

        $html = <<<HTML
<h1 class="center">Top-Category</h1>
<table>
    <tr>
        <th></th>
        <th>Name</th>
		<th>Description</th>
		<th>Visible</th>
		<th>Image</th>
	</tr>
HTML;
        foreach ($all as $top) {
            $name = $top['name'];
            $description = $top['description'];
            $visible = $top['visible'];
            $img = $top['img'];
            $html .= <<<HTML
		<tr>
			<td><input type="radio" name="top-cat"></td>
			<td>$name</td>
			<td>$description</td>
			<td>$visible</td>
			<td>$img</td>
		</tr>
HTML;
        }
        $html .= '</table>';
        return $html;
    }

    public function subCategories() {
        $all = $this->subCategories->getAll();

        $html = <<<HTML
<h1 class="center">Sub-Category</h1>
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

}
