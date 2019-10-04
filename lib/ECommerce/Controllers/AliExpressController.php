<?php


namespace ECommerce\Controllers;


use ECommerce\Scraper;
use ECommerce\Site;

class AliExpressController extends Controller {

    private $scraper;

    public function __construct(Site $site, $post) {
        parent::__construct($site);

        $this->scraper = new Scraper($post["src"]);
        $related = $this->scraper->strip("#root > div > div > div.main-content > div:nth-child(2) > div > div > div.left-refine-container > div.refine-block.category");
        $this->result = json_encode(array("ok" => true, "related" => $related));
    }
}