<?php


namespace ECommerce;


class HomeView extends View {

    protected $site;
    private $subCat;

    public function __construct($site, $user) {
        $this->site = $site;
        $this->subCat = new SubCategories($site);
        $this->setTitle("Home");

        if($user) {
            if($user->isStaff()) {
                $this->addLink("./staff.php", "Staff");
                $this->addLink("./users.php", "Users");
                //$this->addLink("./add-top-cat.php", "Add Top");
                //$this->addLink("./add-sub-cat.php", "Add Sub");
                //$this->addLink("./add-product.php", "Add Product");
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
HTML;
    }

    public function presentSub() {
        $all = $this->subCat->getAll();
        $html = "<div class='container'>";
        foreach ($all as $sub) {
            $img = $sub['img'];
            $name = $sub['name'];
            $description = $sub['description'];
            //$visible = $sub['visible'];
            $html .= <<<HTML
<div class="sub-card">
    <div class="container">
        <h4><b>$name</b></h4>
        <p>$description</p>
    </div>
</div>
HTML;
        }
        $html .= "</div>";
        return $html;
    }

}