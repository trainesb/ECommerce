import $ from 'jquery';
import {parse_json} from './parse_json';

export const Home = function() {

    $(".top-card").click(function (event) {
        event.preventDefault();

        var name = $(".cat-name").text();
        console.log(name);

        window.location.assign("./sub-category.php?name=" + name);
    });
};
