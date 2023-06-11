$(document).ready(function() {

    $("#formDatas").submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $("#overlay").fadeIn(300);　
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "registration-store",
            data: formData,
            processData: false,
            contentType: false,


            success: function(result) {
                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 500);
                $('.text-danger').html("");
                if (result && result.success == true) {
                    $(".success_entry").html('Successfully inserted');
                    formData = "";
                } else {
                    $.each(result.error.details, function(key, value) {
                        const keys = key.split('.')[0];
                        // set the html of the id corresponding to the key to the value
                        $('.' + keys).html(value[0]);
                    });
                }
            },
            error: function(result) {
                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 500);
                console.log("error", result);
            },
        });
    });

});