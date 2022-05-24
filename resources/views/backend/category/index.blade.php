@extends('backend.layouts.master',['page' => 'List'])

@section('title',$panel)

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                @include('backend.includes.flash_message')

                <div class="card-header">
                    <h3 class="card-title">List {{ $panel }}</h3>
                    <a class="btn btn-success btn-md float-right" href="{{ route($base_route.'create') }}">
                        <i class="fas fa-pencil-alt"></i>
                        Create
                    </a>
                    <a class="btn btn-info btn-md float-right" href="{{ route($base_route.'export_collection') }}">
                        <i class="fas fa-pencil-alt"></i>
                        Export (From collection)
                    </a>
                    <a class="btn btn-warning btn-md float-right" href="{{ route($base_route.'export_view') }}">
                        <i class="fas fa-pencil-alt"></i>
                        Export (From View)
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/backend/common/general.js') }}"></script>

<script>
    var dataTable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        stateSave: true,
        order: [[1, 'asc']],
        aaSorting: [],
        ajax: {
            "url": "{{ route('category.data') }}",
            'type': 'POST',
            data: function(d) {
                d._token = "{{ csrf_token() }}";
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
            {data: "name", name: "name"},
            {data: "slug", name: "slug"},
            {data: "image", name: "image"},
            {data: "action", name: "action", searchable: false, orderable: false}
        ]
    });
</script>
@endsection

