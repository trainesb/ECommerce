<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\Products;
use ECommerce\Tables\ProductSubMaps;
use ECommerce\Tables\SubCategories;

class ProductMapView extends View {
    private $site;
    private $prodSubMap;
    private $subCat;
    private $prod;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->subCat = new SubCategories($this->site);
        $this->prod = new Products($this->site);
        $this->prodSubMap = new ProductSubMaps($this->site);

        $this->setTitle("Product Map");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'>";
        echo "<h1 class='center'>Sub-Collection Product Map</h1>";
        echo "<div class='flex-container'>";
        echo $this->presentSub();
        echo $this->presentMap();
        echo $this->presentProd();
        echo "</div></div></div>";
    }

    public function presentSub() {
        $all = $this->subCat->getAll();

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

    public function presentMap() {
        $all = $this->prodSubMap->getAll();

        $html = <<<HTML
<table>
    <tr>
        <th>Sub_id</th>
        <th>SKU</th>
	</tr>
HTML;
        if(!empty($all)) {
            foreach ($all as $map) {
                $sub_id = $map['sub_id'];
                $sku = $map['sku'];
                $html .= <<<HTML
		<tr>
			<td>$sub_id</td>
			<td>$sku</td>
		</tr>
HTML;
            }
        }
        $html .= '</table>';
        return $html;
    }

    public function presentProd() {
        $all = $this->prod->getAll();

        $html = <<<HTML
<table>
    <tr>
        <th>SKU</th>
        <th>Title</th>
	</tr>
HTML;
        foreach ($all as $product) {
            $sku = $product['sku'];
            $title = $product['title'];
            $html .= <<<HTML
		<tr>
			<td>$sku</td>
			<td>$title</td>
		</tr>
HTML;
        }
        $html .= '</table>';
        return $html;
    }
}