<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\SubCategories;
use ECommerce\Tables\TopCategories;
use ECommerce\Tables\TopSubMaps;

class CategoriesView extends View {
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

    public function presentCategories() {
        $allTop = $this->top->getAll();

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
                    $sub = $this->sub->getById($sub_id);
                    $sub_name = $sub['name'];
                    $html .= "<li>$sub_name</li>";
                }
                $html .= "</ul>";
            }

        }
        $html .= "</ul>";
        return $html;
    }

    public function present() {
        echo $this->presentCategories();

        echo "<div class='flex-container'>";
        echo $this->presentTop();

        echo $this->presentMap();

        echo $this->presentSub();
        echo "</div>";
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

}