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
                        <div class="text-success success_entry">

                        </div>
                        <div class="card-body">
                            <form class="row mb-3" id="formDatas" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="col-md-6">
                                    <label for="inputApplicantName4" class="form-label">Applicant Name</label>
                                    <input type="text" class="form-control" id="applicant_name" name="applicant_name">
                                    <div class="text-danger applicant_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <div class="text-danger email">
                                    </div>
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
                                    <div class="text-danger division">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputDistrict" class="form-label">District</label>
                                    <select id="district" name="district" class="form-select">

                                    </select>
                                    <div class="text-danger district">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputThana" class="form-label">Upojila/Thana</label>
                                    <select id="thana_upo" name="thana_upo" class="form-select">

                                    </select>
                                    <div class="text-danger thana">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControladdressDetails" class="form-label">Address Details</label>
                                    <textarea class="form-control" id="address_details" name="address_details" rows="3"></textarea>
                                    <div class="text-danger address_details">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="PHP" id="language_check"
                                            name="language_check[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            PHP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="PYTHON" id="python_check"
                                            name="language_check[]" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Python
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="JAVA" id="java_check"
                                            name="language_check[]" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Java
                                        </label>
                                    </div>
                                    <div class="text-danger language_check">
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
                                                        <option value="" selected>Choose...</option>
                                                        @foreach ($exam as $item)
                                                            <option value={{ $item }}>{{ $item }}</option>
                                                        @endforeach

                                                    </select>
                                                    <div class="text-danger exam">
                                                    </div>
                                                </td>
                                                <td>
                                                    <select id="university" name="university[]" class="form-select">
                                                        <option value="" selected>Choose...</option>
                                                        @foreach ($university as $item)
                                                            <option value="{{ $item }}">{{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="text-danger university">
                                                    </div>
                                                </td>
                                                <td>
                                                    <select id="board" name="board[]" class="form-select">
                                                        <option value="" selected>Choose...</option>
                                                        @foreach ($board as $item)
                                                            <option value="{{ $item }}">{{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="text-danger board">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control col-sm-3" id="result"
                                                        name="result[]">
                                                    <div class="text-danger result">
                                                    </div>
                                                </td>
                                                <td><button type="button" id="education_rowAdder"
                                                        class="btn btn-primary">
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
                                    <input type="file" class="form-control" id="image_file" name="image_file">
                                    <div class="text-danger image_file">
                                    </div>
                                </div>
                                <div class="col-md-6  mb-3">
                                    <label for="inputThana" class="form-label">Applicant Cv</label>
                                    <input type="file" class="form-control" id="cv_file" name="cv_file">
                                    <div class="text-danger cv_file">
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="training_enable"
                                            name="training_enable" value="no">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Training</label>
                                    </div>
                                    <table class="table" id="training_table" style="display:none;">
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
                                                    <div class="text-danger training_name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control col-sm-3"
                                                        id="training_details" name="training_details[]">
                                                    <div class="text-danger training_details">
                                                    </div>
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
                            </br>
                                <div class="col-12 mb-3 mt-10" style="margin-top:10px; float-rigt">
                                    <button type="submit" id="submit_form" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
