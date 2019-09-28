<?php


namespace ECommerce\Views;

use ECommerce\Site;
use ECommerce\Tables\SubCategories;

class HomeView extends View {

    protected $site;
    private $subCat;

    public function __construct(Site $site, $user) {
        $this->site = $site;
        $this->subCat = new SubCategories($site);
        $this->setTitle("Home");

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
            if($sub['visible']) {
                $html .= <<<HTML
<div class="sub-card">
    <img src="$img" alt="Sub-category image">
    <div class="container">
        <h4><b>$name</b></h4>
        <p>$description</p>
    </div>
</div>
HTML;
            }
        }
        $html .= "</div>";
        return $html;
    }

}