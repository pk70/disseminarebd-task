$(document).ready(function() {
    //get the district by division id
    $("#submit_form").click(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const formData = {
            name: $("#applicant_name").val(),
            email: $("#email").val(),
            division: $("#division").val(),
            district: $("#district").val(),
            thana: $("#thana_upo").val(),
            address_details: $("#address_details").val(),
            language_check: $("input[name='language_check[]']").serialize(),
            exam: $("select[name='exam[]']").serialize(),
            university: $("select[name='university[]']").serialize(),
            board: $("select[name='board[]']").serialize(),
            result: $("select[name='result[]']").serialize(),
            training_name: $("input[name='training_name[]']").serialize(),
            training_details: $("input[name='training_details[]']").serialize(),
            image_file: $("#image_file").val(),
            cv_file: $("#cv_file").val(),
            training_enable: $("#training_enable").val(),
            //superheroAlias: $("#superheroAlias").val(),
        };

        //const formData = $('#formDatas').serialize();

        console.log(formData);

        $.ajax({
            type: "POST",
            url: "registration-store",
            data: {
                formData,
            },

            success: function(result) {

                if (result && result.status == "success") {

                }
            },
            error: function(result) {
                console.log("error", result);
            },
        });
    });

});