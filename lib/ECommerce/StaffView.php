<?php


namespace ECommerce;


class StaffView extends View {

    protected $site;
    private $topCategories;
    private $subCategories;
    private $products;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->topCategories = new TopCategories($this->site);
        $this->subCategories = new SubCategories($this->site);
        $this->products = new Products($this->site);

        $this->setTitle("Staff View");
        $this->addLink("./users.php", "Users");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("./add-top-cat.php", "Add Top");
        $this->addLink("./add-sub-cat.php", "Add Sub");
        $this->addLink("./add-product.php", "Add Product");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo $this->presentTopCategories();
        echo $this->presentSubCategories();
        echo $this->presentProducts();
    }

    public function presentTopCategories() {
        $all = $this->topCategories->getAll();

        $html = <<<HTML
<h3>Top-Categories</h3>
<table>
    <tr>
        <th></th>
        <th>Name</th>
		<th>Description</th>
		<th>Visible</th>
	</tr>
HTML;
        foreach ($all as $top) {
            $name = $top['name'];
            $description = $top['description'];
            $visible = $top['visible'];
            $html .= <<<HTML
		<tr>
			<td><input type="radio" name="top-cat"></td>
			<td>$name</td>
			<td>$description</td>
			<td>$visible</td>
		</tr>
HTML;
        }
        $html .= '</table>';
        return $html;
    }

    public function presentSubCategories() {
        $all = $this->subCategories->getAll();

        $html = <<<HTML
<h3>Sub-Categories</h3>
<table>
    <tr>
        <th></th>
        <th>Name</th>
		<th>Description</th>
		<th>Visible</th>
	</tr>
HTML;
        if($all) {
            foreach ($all as $sub) {
                $name = $sub['name'];
                $description = $sub['description'];
                $visible = $sub['visible'];
                $html .= <<<HTML
            <tr>
                <td><input type="radio" name="product"></td>
                <td>$name</td>
                <td>$description</td>
                <td>$visible</td>
            </tr>
HTML;
            }
        }
        $html .= '</table>';
        return $html;
    }


    public function presentProducts() {
        $all = $this->products->getAll();

        $html = <<<HTML
<h3>Products</h3>
<table>
    <tr>
        <th></th>
        <th>SKU</th>
        <th>Title</th>
        <th>Price</th>
        <th>Sold Out</th>
		<th>Description</th>
		<th>Visible</th>
	</tr>
HTML;
        foreach ($all as $product) {
            $sku = $product['sku'];
            $title = $product['title'];
            $price = $product['price'];
            $soldout = $product['soldout'];
            $description = $product['description'];
            $visible = $product['visible'];
            $html .= <<<HTML
		<tr>
			<td><input type="radio" name="product"></td>
			<td>$sku</td>
			<td>$title</td>
			<td>$price</td>
			<td>$soldout</td>
			<td>$description</td>
			<td>$visible</td>
		</tr>
HTML;
        }
        $html .= '</table>';
        return $html;
    }

}