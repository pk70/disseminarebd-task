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
            <form class="row mb-3">
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
                    <select id="division" class="form-select">
                      <option selected>Choose...</option>
                      <option>Dhaka</option>
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
                        <input class="form-check-input" type="checkbox" value="" id="python_check" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          Python
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="java_check" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Java
                        </label>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <label for="inputApplicantName4" class="form-label">Educational Qualification:</label>
                    <table class="table">
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
                                <select id="exam" class="form-select">
                                <option selected>Choose...</option>
                                <option>M.Sc</option>
                              </select>
                            </td>
                            <td>
                                <select id="university" class="form-select">
                                <option selected>Choose...</option>
                                <option>Jagannath University</option>
                              </select>
                            </td>
                            <td>
                                <select id="board" class="form-select">
                                <option selected>Choose...</option>
                                <option>Dhaka Board</option>
                              </select>
                            </td>
                            <td>
                                <input type="text" class="form-control col-sm-3" id="result">
                            </td>
                            <td>+ add more</td>
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
                                <input type="text" class="form-control col-sm-3" id="training_name">

                            </td>
                            <td>
                                <input type="text" class="form-control col-sm-3" id="training_details">

                            </td>
                            <td><button type="button" id="training_rowAdder" class="btn btn-primary">Add more..</button></td>
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
    $("#training_rowAdder").click(function () {
        let newRowAdd='';
        newRowAdd ='<tr>'+
            '<td>'+
            '<input type="text" class="form-control col-sm-3" id="training_name">'+
            '</td>'+'<td>sss</td>'+'<td><button type="button" id="training_rowRemover" class="btn btn-warning">Remove</button></td>'+
            '<tr>';
        $('#training_table > tbody').append(newRowAdd);
        // let i = 3;
        // $('#training_table > tbody >  tr').eq(i-1).after(newRowAdd);
    });
    $("body").on("click", "#training_rowRemover", function () {
        alert('f');
        $(this).parent().parent().remove();
        //$(this).parents("#row").remove();
    })
</script>
  @endsection
