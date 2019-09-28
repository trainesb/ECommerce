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

        $this->setTitle("Pet Pack, LLC. Users");
        $this->addLink("staff.php", "Staff");
        $this->addLink("profile.php", "Profile");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        $users = $this->users->getAll();
        $html = <<<HTML
<form class="table">
	<p>
	<input type="submit" name="add" id="add" value="Add">
	<input type="submit" name="edit" id="edit" value="Edit">
	<input type="submit" name="delete" id="delete" value="Delete">
	</p>
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