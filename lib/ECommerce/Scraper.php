<?php


namespace ECommerce;
require_once './lib/simple_html_dom.php';

class Scraper {

    private $html;

    public function __construct() {
        $url = "https://best.aliexpress.com/";
        $this->html = file_get_html($url);
    }

    public function stripCat() {
        $rtrn = array();
        foreach($this->html->find('dt[class=cate-name] span a') as $cat) {
            array_push($rtrn, $cat);
        }
        return $rtrn;
    }
}