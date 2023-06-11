@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <!-- left column -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2> Applicant List</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead>
                                      <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address details</th>
                                        <th scope="col">Language</th>
                                        <th scope="col">Division</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Thana</th>
                                        <th scope="col">Education</th>
                                        <th scope="col">Training</th>
                                        <th scope="col">File</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
       $(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        // 'columnDefs'        : [
        //         {
        //             'searchable'    : false,
        //             'targets'       : [0,2,3,4,5,6,7,8,9,10,11]
        //         },
        //     ],
        ajax: "{{ route('list-applicant') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'applicant_name', name: 'applicant_name'},
            {data: 'email', name: 'email'},
            {data: 'address_details', name: 'address_details'},
            {data: 'programming_language', name: 'programming_language'},
            {data: 'division', name: 'id_division'},
            {data: 'district', name: 'district'},
            {data: 'thana', name: 'thana'},

            {data: 'list_edu', name: 'list_edu'},
            {data: 'list_training', name: 'list_training'},
            {data: 'files', name: 'files'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
      </script>
@endsection
