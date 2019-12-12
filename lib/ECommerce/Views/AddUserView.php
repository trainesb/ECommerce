<?php


namespace ECommerce\Views;


use ECommerce\Site;

class AddUserView extends View {

    private $site;

    public function __construct(Site $site) {
        $this->site = $site;

        $this->setTitle("Add Users");
    }

    public function present() {
        echo "<div class='row-container'>";
        echo $this->sideNav();
        echo "<div class='col-main'><h1 class='center'>Users</h1>";

        echo $this->addUser();
        echo "</div></div>";
    }

    public function addUser() {
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
