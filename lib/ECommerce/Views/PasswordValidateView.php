<?php


namespace ECommerce\Views;

use ECommerce\Site;

class PasswordValidateView extends View {

    private $validator;

    public function __construct(Site $site, $_GET) {
        $this->setTitle("Pet Pack, LLC. Password Entry");
        $this->validator = strip_tags($get['v']);
    }

    public function present() {
        return <<<HTML
<form action="post/password-validate.php" method="post">
<input type="hidden" name="validator" value="$this->validator">

        <p>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email">
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Password">
        </p>        
        <p>
            <label for="password2">Password (again)</label><br>
            <input type="password" id="password2" name="password2" placeholder="Password">
        </p>
        <p>
            <input type="submit" value="OK"> <input type="button" value="Cancel">
        </p>
</p>

</form>
HTML;

    }
}