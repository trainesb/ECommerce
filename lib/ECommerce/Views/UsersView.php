<?php


namespace ECommerce\Views;

use ECommerce\Site;
use ECommerce\Tables\Users;

class UsersView extends View {

    private $site;
    private $users;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->users = new Users($this->site);

        $this->setTitle("Users");

        $this->addLink("./profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'><h1 class='center'>Users</h1>";

        echo $this->users();
        echo "</div></div>";
    }

    public function users() {
        $users = $this->users->getAll();
        $html = <<<HTML
<form class="table">
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