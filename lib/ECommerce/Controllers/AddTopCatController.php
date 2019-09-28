<?php


namespace ECommerce\Controllers;


use ECommerce\Site;
use ECommerce\Tables\TopCategories;

class AddTopCatController extends Controller {

    protected $site;
    private $topCategories;

    public function __construct(Site $site, $post) {
        parent::__construct($site);
        $this->site = $site;
        $this->topCategories = new TopCategories($site);

        if($post) {
            $visible = 0;

            if($post['visible'] != 'false') {
                $visible = 1;
            }
            $name = $post['name'];
            $description = $post['description'];
            if($this->topCategories->add($name, $description, $visible)) {
                $this->result = json_encode(["ok" => true]);
            } else {
                $this->result = json_encode(["ok" => false]);
            }
        }
    }
}