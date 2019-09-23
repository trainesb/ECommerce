<?php


namespace ECommerce;


class AddSubCatController extends Controller {

    public function __construct(Site $site, $post, $file) {
        parent::__construct($site);


        if($post) {
            print_r($post);
            print_r($file);
        }
    }
}