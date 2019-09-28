<?php


namespace ECommerce\Views;

use ECommerce\Site;
use ECommerce\Tables\Users;

class UserView extends View {

    private $site;
    private $users;

    public function __construct(Site $site) {
        $this->site = $site;
        $this->users = new Users($this->site);

        $this->setTitle("Users");

        $this->addLink("./staff.php", "Staff");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        echo $this->presentUsers();
        echo $this->presentAddUser();
    }

    public function presentAddUser() {
        return <<<HTML
<form>
	<fieldset>
		<legend>User</legend>
		<p>
			<label for="email">Email</label><br>
			<input type="email" id="email" name="email" placeholder="Email">
		</p>
		<p>
			<label for="name">Name</label><br>
			<input type="text" id="name" name="name" placeholder="Name">
		</p>
		<p>
			<label for="phone">Phone</label><br>
			<input type="text" id="phone" name="phone" placeholder="Phone">
		</p>
		<p>
			<label for="address">Address</label><br>
			<textarea id="address" name="address" placeholder="Address"></textarea>
		</p>
		<p>
			<label for="notes">Notes</label><br>
			<textarea id="notes" name="notes" placeholder="Notes"></textarea>
		</p>
		<p>
			<label for="role">Role: </label>
			<select id="role" name="role">
				<option value="admin">Admin</option>
				<option value="staff">Staff</option>
				<option value="client">Client</option>
			</select>
		</p>
		<p>
			<input type="submit" value="OK"> <input type="submit" value="Cancel">
		</p>

	</fieldset>
</form>
HTML;
    }

    public function presentUsers() {
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