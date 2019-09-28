<?php


namespace ECommerce\Views;


use ECommerce\Site;
use ECommerce\Tables\Products;
use ECommerce\Tables\SubCategories;
use ECommerce\Tables\TopCategories;
use ECommerce\Tables\Users;

class StaffView extends View {

    protected $site;
    private $topCategories;
    private $subCategories;
    private $products;
    private $users;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->users = new Users($site);
        $this->topCategories = new TopCategories($this->site);
        $this->subCategories = new SubCategories($this->site);
        $this->products = new Products($this->site);

        $this->setTitle("Staff Views");
        $this->addLink("./users.php", "Users");
        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo $this->presentTopCategories();
        echo $this->presentSubCategories();
        echo $this->presentProducts();
        echo $this->presentUsers();
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

    public function presentBtns() {
        $html = <<<HTML
<div class="staff-btns">
    <p><a href="./user.php">Add User</a></p>
    <p><a href="./add-top-cat.php">Add Top-Category</a></p>
    <p><a href="./add-sub-cat.php">Add Sub-Category</a></p>
    <p><a href="./add-product.php">Add Product</a></p>
</div>
HTML;
        return $html;
    }

    public function presentUsers() {
        $users = $this->users->getAll();
        $html = <<<HTML
<form class="table">
	<h3>Users</h3>
	<table>
		<tr>
			<th>&nbsp;</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
		</tr>
HTML;

        foreach ($users as $user) {
            $name = $user["name"];
            $email = $user["email"];
            $role = $user["role"];
            $html .= <<<HTML
		<tr>
			<td><input type="radio" name="user"></td>
			<td>$name</td>
			<td>$email</td>
			<td>$role</td>
		</tr>
HTML;

        }

        $html .= <<<HTML
	</table>
</form>
HTML;
        return $html;

    }

}