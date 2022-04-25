@extends('backend.layouts.master')

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
            <div class="card card">
                <div class="card-header">
                    <h3 class="card-title">Show Attribute</h3>
                    <a class="btn btn-info btn-md float-right ml-1" href="{{ route('test.index') }}">
                        <i class="fas fa-list"></i> List
                    </a>
                    <a class="btn btn-success btn-md float-right" href="{{ route('test.create') }}">
                        <i class="fas fa-pencil-alt"></i>
                        Create
                    </a>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <td>{{ $data['row']->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $data['row']->email }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $data['row']->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $data['row']->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

