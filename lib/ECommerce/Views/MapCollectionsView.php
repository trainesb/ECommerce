<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\SubCategories;
use ECommerce\Tables\TopCategories;
use ECommerce\Tables\TopSubMaps;

class MapCollectionsView extends View {
    private $site;
    private $topSubMap;
    private $top;
    private $sub;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->topSubMap = new TopSubMaps($this->site);
        $this->top = new TopCategories($this->site);
        $this->sub = new SubCategories($this->site);

        $this->setTitle("Categories");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("post/logout.php", "Log Out");
    }



    public function present() {

        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo "<h1 class='center'>Map Collections</h1>";
        echo "<div class='flex-container'>";
        echo $this->presentTop();
        echo $this->presentMap();
        echo $this->presentSub();
        echo "</div>";

        echo $this->addMap();
        echo "</div></div>";
    }

    public function presentTop() {
        $all = $this->top->getAll();

        $html = "<div class='top-container'><table><tr><th>ID</th><th>Top-Categories</th></tr>";

        foreach ($all as $top) {
            $name = $top['name'];
            $id = $top['id'];
            $html .= "<tr><td>$id</td><td>$name</td></tr>";
        }
        $html .= '</table></div>';
        return $html;
    }

    public function presentMap() {
        $all = $this->topSubMap->getAll();

        $html = "<div class='map-container'><table><tr><th>top_id</th><th>sub_id</th></tr>";

        if($all) {
            foreach ($all as $map) {
                $top = $map['top_id'];
                $sub = $map['sub_id'];

                $html .= "<tr><td>$top</td><td>$sub</td></tr>";
            }
            $html .= "</table></div>";
            return $html;
        }
    }

    public function presentSub() {
        $all = $this->sub->getAll();

        $html = "<div class='sub-container'><table><tr><th>ID</th><th>Sub-Categories</th></tr>";

        if($all) {
            foreach ($all as $sub) {
                $id = $sub['id'];
                $name = $sub['name'];
                $html .= "<tr><td>$id</td><td>$name</td></tr>";
            }
        }
        $html .= '</table></div>';
        return $html;
    }

    public function addMap() {
        $allTop = $this->top->getAll();
        $allSub = $this->sub->getAll();
        $html = <<<HTML
<form id="add-top-sub">
    <fieldset>
        <legend>Top-Sub Map</legend>
        <p>
            <label for="top_id">Top-Category</label>
            <select id="top_id" name="top_id">
HTML;

        if(!empty($allTop)) {
            foreach ($allTop as $top) {
                $top_id = $top['id'];
                $top_name = $top['name'];
                $html .= "<option value='$top_id'>$top_name</option>";
            }
        }

        $html .= <<<HTML
            </select>
        </p>
        <p>
            <label for="sub_id">Sub-Category</label>
            <select id="sub_id" name="sub_id">
HTML;

        if(!empty($allSub)) {
            foreach ($allSub as $sub) {
                $sub_id = $sub['id'];
                $sub_name = $sub['name'];
                $html .= "<option value='$sub_id'>$sub_name</option>";
            }
        }

        $html .= <<<HTML
            </select>
        </p>
       	<p>
			<input type="submit" value="OK">
		</p>
    </fieldset>
</form>
HTML;
        return $html;
    }
}