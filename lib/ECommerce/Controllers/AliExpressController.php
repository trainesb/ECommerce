<?php

namespace ECommerce\Controllers;

use ECommerce\Site;

class AliExpressController extends Controller {

    public function __construct(Site $site, $post) {
        parent::__construct($site);

        $this->result = json_encode(array("ok" => true, "src" => $post['src']));
    }
}
