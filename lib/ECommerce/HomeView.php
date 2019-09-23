<?php


namespace ECommerce;


class HomeView extends View {

    public function __construct($user) {
        $this->setTitle("Home");

        if($user) {
            if($user->isStaff()) {
                $this->addLink("./staff.php", "Staff");
                $this->addLink("./users.php", "Users");
            }
            $this->addLink("./profile.php", "Profile");
            $this->addLink("./logout,php", "Log Out");
        } else {
            $this->addLink("login.php", "Log In");
        }
    }

    protected function headerAdditional() {
        return <<<HTML
<p>Welcome to (Business Name)!</p>
<p>Business Info & Description Here...</p>
<br>
<p><a href="">Learn more</a></p>
HTML;
    }

}