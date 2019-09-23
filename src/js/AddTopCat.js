import $ from 'jquery';
import {parse_json} from "./parse_json";

export const AddTopCat = function () {

    $("form#add-top-cat").submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: "post/add-top-cat.php",
            data: $(this).serialize(),
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                console.log(json);
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