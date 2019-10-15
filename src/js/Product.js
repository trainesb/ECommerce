import $ from 'jquery';
import {parse_json} from "./parse_json";

export const Product = function () {

    $("form#add-product").submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: "post/product.php",
            data: $(this).serialize(),
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    alert("Added!");
                    window.location.reload();
                } else {
                    alert("Error when adding to DB!");
                }
            },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            }
        });
    });
};
