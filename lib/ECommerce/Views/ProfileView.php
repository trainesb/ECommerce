<?php


namespace ECommerce\Views;

use ECommerce\User;

class ProfileView extends View {

    private $user;

    public function __construct(User $user) {
        $this->user = $user;

        $this->setTitle("Profile");

        if($user->isStaff()) {
            $this->addLink("staff.php", "Staff");
        }
        $this->addLink("post/logout.php", "Log Out");
    }

    public function present() {
        $name = $this->user->getName();
        $role = $this->user->getRole();
        $notes = $this->user->getNotes();
        $address = $this->user->getAddress();
        $phone = $this->user->getName();
        $email = $this->user->getEmail();
        return <<<HTML
<div class="user-card">
    <p>Name: $name</p>
    <p>Email: $email</p>
    <p>Phone: $phone</p>
    <p>Address: $address</p>
    <p>Notes: $notes</p>
    <p>Role: $role</p>
</div>
HTML;

    }
}