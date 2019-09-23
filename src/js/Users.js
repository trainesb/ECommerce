import $ from 'jquery';
import {parse_json} from "./parse_json";

export const Users = function () {

    $("#add").click(function (event) {
        event.preventDefault();

        window.location.assign("./user.php");
    });
};