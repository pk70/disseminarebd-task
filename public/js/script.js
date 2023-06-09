$(document).ready(function() {
    //initialize two value
    let trainingCounter = 1;
    let educationCounter = 1;
    //add training row
    $("#training_rowAdder").click(function(e) {
        e.preventDefault();
        //check over 10 row
        if (trainingCounter > 10) {
            alert('Only 10 field can be added');
            return false;
        }
        let newRowAdd = '';
        newRowAdd = '<tr>' +
            '<td>' +
            '<input type="text" class="form-control col-sm-3" id="training_name" name="training_name[]">' +
            '</td>' + '<td>' +
            '<input type="text" class="form-control col-sm-3" id="training_details" name="training_details[]"></td>' +
            '<td><button type="button" id="training_rowRemover" class="btn btn-primary">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-minus-fill" viewBox="0 0 16 16">' +
            '<path fill-rule="evenodd" d="M16 8a5 5 0 0 1-9.975.5H4A1.5 1.5 0 0 1 2.5 10h-1A1.5 1.5 0 0 1 0 8.5v-1A1.5 1.5 0 0 1 1.5 6h1A1.5 1.5 0 0 1 4 7.5h2.025A5 5 0 0 1 16 8zm-2 0a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5A.5.5 0 0 0 14 8z"/>' +
            '</svg>' +
            '</svg>Remove</button>' +
            '</td>' +
            '<tr>';
        $('#training_table > tbody').append(newRowAdd);
        trainingCounter++;
    });
    //remove training row
    $(document).on('click', '#training_rowRemover', function(e) {
        e.preventDefault();
        $(this).parent().parent().remove();
        trainingCounter--;
    });
    //append education row
    $("#education_rowAdder").click(function(e) {
        e.preventDefault();
        if (educationCounter > 4) {
            alert('Only 4 field can be added');
            return false;
        }
        let eduNewRow = '';
        let examOption = '';
        let universityOption = '';
        let boardOption = '';
        examOption = $('#exam').html();
        universityOption = $('#university').html();
        boardOption = $('#board').html();

        eduNewRow = '<tr>' +
            '<td>' +
            '<select id="exam" name="exam[]" class="form-select">' +
            examOption +
            '</select>' +
            '</td>' + '<td>' +
            '<select id="university" name="university[]" class="form-select">' +
            universityOption +
            '</select>' +
            '</td>' + '<td>' +
            '<select id="board" name="board[]" class="form-select">' +
            boardOption +
            '</select>' +
            '</td>' + '<td>' +
            '<input type="text" class="form-control col-sm-3" id="result" name="result[]"></td>' +
            '<td><button type="button" id="education_rowRemover" class="btn btn-primary">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-minus-fill" viewBox="0 0 16 16">' +
            '<path fill-rule="evenodd" d="M16 8a5 5 0 0 1-9.975.5H4A1.5 1.5 0 0 1 2.5 10h-1A1.5 1.5 0 0 1 0 8.5v-1A1.5 1.5 0 0 1 1.5 6h1A1.5 1.5 0 0 1 4 7.5h2.025A5 5 0 0 1 16 8zm-2 0a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5A.5.5 0 0 0 14 8z"/>' +
            '</svg>' +
            '</svg>Remove</button>' +
            '</td>' +
            '<tr>';
        $('#education_table > tbody').append(eduNewRow);
        educationCounter++;

    });
    $(document).on('click', '#education_rowRemover', function(e) {
        e.preventDefault();
        $(this).parent().parent().remove();
        educationCounter--;
    });

    //get the district by division id
    $("#division").change(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        const id_division = $(this).val();

        if ($(this).val() == "") {
            const id_division = null;
        }


        $.ajax({
            type: "GET",
            url: "/district/" + id_division,
            // data: {
            //     id: id_division,
            // },
            success: function(result) {
                $("#district").empty();

                if (result && result.status == "success") {
                    $("#district").append('<option value="">Choose..</option>');
                    $.each(result.data, function(key, value) {
                        const district = '<option value="' + value.id + '"> ' + value.name + ' </option>';
                        $("#district").append(district);
                    });
                }
            },
            error: function(result) {
                console.log("error", result);
            },
        });
    });
    //get the thanas by district id
    $("#district").change(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        const id_district = $(this).val();

        if ($(this).val() == "") {
            const id_district = null;
        }

        $.ajax({
            type: "GET",
            url: "/thanas/" + id_district,

            success: function(result) {
                $("#thana_upo").empty();

                if (result && result.status == "success") {
                    $("#thana_upo").append('<option value="">Choose...</option>');
                    $.each(result.data, function(key, value) {
                        const thanas = '<option value="' + value.id + '"> ' + value.name + ' </option>';
                        $("#thana_upo").append(thanas);
                    });
                }
            },
            error: function(result) {
                console.log("error", result);
            },
        });
    });
    //showing training table by check switch
    $("#training_enable").change(function() {
        if ($(this).prop("checked") == true) {
            $("#training_table").css("display", "");
            $(this).val('yes');
        } else {
            $(this).val('no');
            $("#training_table").css("display", "none");
        }

    });

});