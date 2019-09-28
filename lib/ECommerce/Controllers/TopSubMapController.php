<?php


namespace ECommerce\Controllers;


use ECommerce\Site;
use ECommerce\Tables\TopSubMaps;

class TopSubMapController extends Controller {

    private $topSub;

    public function __construct(Site $site, $post) {
        parent::__construct($site);

        $this->topSub = new TopSubMaps($site);
        $top_id = $post['top_id'];
        $sub_id = $post['sub_id'];
        if($this->topSub->add($top_id, $sub_id)) {
            $this->result = json_encode(["ok" => true]);
        } else {
            $this->result = json_encode(["ok" => false]);
        }
    }
}