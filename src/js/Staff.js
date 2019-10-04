import $ from 'jquery';
import {parse_json} from "./parse_json";

export const Staff = function () {

    $("div.sideNav p.products").click(function (event) {
        event.preventDefault();

        $("p.products + ul.sub").toggle();
    });

    $("div.sideNav p.collections").click(function (event) {
        event.preventDefault();

        $("p.collections + ul.sub").toggle();
    });

    $("div.sideNav p.users").click(function (event) {
        event.preventDefault();

        $("p.users + ul.sub").toggle();
    });
};