import $ from 'jquery';
import {parse_json} from "./parse_json";

export const Ali = function () {

    $("div.col-main > a").click(function (event) {
       event.preventDefault();

       var name = $(this).text();
       var src = "https:" + $(this).attr("href");
       console.log(name);
       console.log(src);

        $.ajax({
            url: "post/ali-express.php",
            data: {src : src},
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                console.log(json);
                if(json.ok) {
                    console.log(json);
                } else {
                    alert(json.message);
                }
            },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            }
        });
    });
};