<?php


namespace ECommerce\Views;

use ECommerce\Site;

class UserView extends View {

    public function __construct(Site $site) {
        $this->setTitle("Pet Pack, LLC. User");

        $this->addLink("users.php", "Users");
        $this->addLink("staff.php", "Staff");
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
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
}