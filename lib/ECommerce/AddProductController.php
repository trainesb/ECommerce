<?php


namespace ECommerce;


class AddProductController extends Controller {

    private $products;

    public function __construct(Site $site, $post) {
        parent::__construct($site);
        $this->products = new Products($site);

        if($post) {
            if($this->products->add($post)) {
                $this->result = json_encode(["ok" => true]);
            } else {
                $this->result = json_encode(["ok" => false]);
            }
        }
        json_encode(["ok" => false]);
    }
}