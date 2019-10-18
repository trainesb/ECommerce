<?php


namespace ECommerce\Views;


use ECommerce\Site;

class Cart extends View {

    public function __construct(Site $site, $user) {
        $this->setTitle("Cart");

        if($user) {
            if($user->isStaff()) {
                $this->addLink("./staff.php", "Staff");
            }
            $this->addLink("./profile.php", "Profile");
            $this->addLink("./logout,php", "Log Out");
        } else {

            $this->addLink("login.php", "Log In");
        }
    }
}
