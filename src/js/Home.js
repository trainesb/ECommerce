import $ from 'jquery';
import {parse_json} from './parse_json';

export const Home = function() {

    $(".top-card").click(function (event) {
        event.preventDefault();

        var name = $(".cat-name").text();
        console.log(name);

        window.location.assign("./top-category.php?top-category=" + name);
    });

    $(".sub-card").click(function (event) {
        event.preventDefault();

        var name = $(".cat-name").text();
        console.log(name);

        window.location.assign("./sub-category.php?sub-category=" + name);
    });

    $(".prdct-card").click(function (event) {
        event.preventDefault();

        var sku = $(".prdct-card > .sku").text();
        console.log(sku);

        window.location.assign("./product.php?sku=" + sku);
    });

};
