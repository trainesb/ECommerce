import $ from 'jquery';
import {parse_json} from "./parse_json";

export const Staff = function () {

    $("div.sideNav p.orders").click(function (event) {
        event.preventDefault();

        $("p.orders + ul.sub").toggle();
    });

    $("div.sideNav p.products").click(function (event) {
        event.preventDefault();

        $("p.products + ul.sub").toggle();
    });

    $("div.sideNav p.analytics").click(function (event) {
        event.preventDefault();

        $("p.analytics + ul.sub").toggle();
    });
};