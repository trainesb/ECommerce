<?php


namespace ECommerce;


class AddSubCatController extends Controller {

    public function __construct(Site $site, $post, $files) {
        parent::__construct($site);

        if(!empty($files) && !empty($post)) {
            $img = addslashes(file_get_contents($files['file']['tmp_name']));
            $name = $post['name'];
            $description = $post['description'];
            $visible = $post['visible'];
            $sub = new SubCategories($site);
            if($sub->add($name, $description, $visible, $img)) {
                $this->result = json_encode(["ok" => true]);
            } else {
                $this->result = json_encode(["ok" => false]);
            }
        }
    }

}