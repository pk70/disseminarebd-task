@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <!-- left column -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2> Registration form</h2>
                        </div>
                        <div class="card-body">
                            <form class="row mb-3" method="post" action="{{ route('store-registration') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="col-md-6">
                                    <label for="inputApplicantName4" class="form-label">Applicant Name</label>
                                    <input type="text" class="form-control" id="applicant_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputDivision" class="form-label">Division</label>
                                    <select id="division" name="division" class="form-select">
                                        <option value="">Choose...</option>
                                        @if ($divisions)
                                            @foreach ($divisions as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputDistrict" class="form-label">District</label>
                                    <select id="district" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Dhaka</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputThana" class="form-label">Upojila/Thana</label>
                                    <select id="thana_upo" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Sabujbag</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControladdressDetails" class="form-label">Address Details</label>
                                    <textarea class="form-control" id="address_details" rows="3"></textarea>
                                </div>
                                <div id="address_details" class="invalid-feedback">
                                    Please write address.
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="PHP" id="php_check">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            PHP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="python_check"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Python
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="java_check"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Java
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputApplicantName4" class="form-label">Educational Qualification:</label>
                                    <table class="table" id="education_table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Exam</th>
                                                <th scope="col">University</th>
                                                <th scope="col">Board</th>
                                                <th scope="col">Result</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">
                                                    <select id="exam" name="exam[]" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <option>M.Sc</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="university" name="university[]" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <option>Jagannath University</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="board" name="board[]" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <option>Dhaka Board</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control col-sm-3" id="result"
                                                        name="result[]">
                                                </td>
                                                <td><button type="button" id="education_rowAdder" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z">
                                                            </path>
                                                        </svg>
                                                        Add more
                                                    </button></td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputThana" class="form-label">Applicant Photo</label>
                                    <input type="file" class="form-control" id="image_file">
                                </div>
                                <div class="col-md-6  mb-3">
                                    <label for="inputThana" class="form-label">Applicant Cv</label>
                                    <input type="file" class="form-control" id="cv_file">
                                </div>
                                <div class="col-md-12">

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Training</label>
                                    </div>
                                    <table class="table" id="training_table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Training Name</th>
                                                <th scope="col">Training Details</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">
                                                    <input type="text" class="form-control col-sm-3"
                                                        id="training_name" name="training_name[]">

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control col-sm-3"
                                                        id="training_details" name="training_details[]">

                                                </td>
                                                <td><button type="button" id="training_rowAdder"
                                                        class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z">
                                                            </path>
                                                        </svg>
                                                        Add more
                                                    </button>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
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
            })
            $("#education_rowAdder").click(function(e) {
                e.preventDefault();
                if (educationCounter > 10) {
                    alert('Only 10 field can be added');
                    return false;
                }
                let eduNewRow = '';
                eduNewRow = '<tr>' +
                    '<td>' +
                    '<select id="exam" name="exam[]" class="form-select">' +
                    '<option selected>Choose...</option>' +
                    '<option>M.Sc</option>' +
                    '</select>' +
                    '</td>' + '<td>' +
                    '<select id="university" name="university[]" class="form-select">' +
                    '<option selected>Choose...</option>' +
                    '<option>Jagannatg</option>' +
                    '</select>' +
                    '</td>' + '<td>' +
                    '<select id="board" name="board[]" class="form-select">' +
                    '<option selected>Choose...</option>' +
                    '<option>Chittagong</option>' +
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
        });
    </script>
@endsection
