import $ from 'jquery';
import {parse_json} from "./parse_json";
export const Scraper = function () {



    var cors_api_url = 'https://cors-anywhere.herokuapp.com/';
    function doCORSRequest(options, printResult) {
        var x = new XMLHttpRequest();
        x.open(options.method, cors_api_url + options.url);
        x.onload = x.onerror = function() {
            printResult(
                options.method + ' ' + options.url + '\n' +
                x.status + ' ' + x.statusText + '\n\n' +
                (x.responseText || '')
            );
        };
        x.send(options.data);
    }

    $("#Ali").click(function (e) {
        e.preventDefault();

        var urlField = 'https://www.aliexpress.com/';
        doCORSRequest({
            method: 'GET',
            url: urlField,
            data: '',
        }, function printResult(result) {
            console.log(result);

            var categories = $("#home-firstscreen > div.container > div > div.categories > div > div.categories-list-box > dl.cl-item > dt").html(result);

            console.log(categories);

            $("#Ali-test").text(categories);
        });
        if (typeof console === 'object') {
            console.log('// To test a local CORS Anywhere server, set cors_api_url. For example:');
            console.log('cors_api_url = "http://localhost:8080/"');
        }
    });
};
