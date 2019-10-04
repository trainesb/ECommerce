<?php


namespace ECommerce;

class Scraper {

    private $html;

    public function __construct($url) {
        $this->html = file_get_html($url);
    }

    public function strip($element) {
        $rtrn = array();
        foreach($this->html->find($element) as $cat) {
            array_push($rtrn, $cat);
        }
        return $rtrn;
    }
}