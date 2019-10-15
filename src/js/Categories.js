import $ from 'jquery';
import {parse_json} from './parse_json';

export const Categories = function() {

    $("select#category-type").change(function (event) {
        event.preventDefault();

        if($(this).val() === "sub") {
            $("span.hidden").toggle();
        } else {
            if($("span.hidden").is(":visible")) {
                $("span.hidden").toggle();
            }
        }
    });

    $("form#categories").submit(function (event) {
        event.preventDefault();

        var form_data = new FormData();
        var type = $("select#category-type").val();

        form_data.append('name', $("#name").val());
        form_data.append('description', $("#description").val());
        form_data.append('type', type);
        form_data.append('file', $("#file")[0].files[0]);
        form_data.append('visible', $("#visible").val());

        if(type === "sub") {
            form_data.append('parentID', $("#parent-cat").val());
        }

        $.ajax({
            url: "post/add-cat.php",
            data: form_data,
            processData: false,
            contentType: false,
            type: "POST",
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
