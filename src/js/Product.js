import $ from 'jquery';
import {parse_json} from "./parse_json";

export const Product = function () {

    $("form#add-product").submit(function (event) {
        event.preventDefault();

        var form_data = new FormData();

        form_data.append('sku', $("#sku").val());
        form_data.append('title', $("#title").val());
        form_data.append('price', $("#price").val());
        form_data.append('sold-out', $("#sold-out").val());
        form_data.append('description', $("#description").val());
        form_data.append('file', $("#file")[0].files[0]);
        form_data.append('visible', $("#visible").val());

        $.ajax({
            url: "post/product.php",
            data: form_data,
            processData: false,
            contentType: false,
            type: "POST",
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
