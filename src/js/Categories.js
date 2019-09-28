import $ from 'jquery';
import {parse_json} from './parse_json';

export const Categories = function() {

    $("#add-top-sub").submit(function (event) {
        event.preventDefault();

        var top_id = $("#top_id").val();
        var sub_id = $("#sub_id").val();

        $.ajax({
            url: "post/categories.php",
            data: {"top_id" : top_id, "sub_id" : sub_id},
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    alert("Added!");
                    window.location.reload();
                } else {
                    alert("There was an error when adding!");
                }
            },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            }
        });
    });
};