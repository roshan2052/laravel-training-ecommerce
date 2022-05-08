@extends('backend.layouts.master',['page' => 'edit'])

@section('title','edit'.' '.$panel)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card">

            <div class="card-header">
                <h3 class="card-title">Edit {{ $panel }}</h3>
                <a class="btn btn-info btn-md float-right ml-1" href="{{ route($base_route.'index') }}">
                    <i class="fas fa-list"></i> List
                </a>
                <a class="btn btn-success btn-md float-right" href="{{ route($base_route.'create') }}">
                    <i class="fas fa-pencil-alt"></i>
                    Create
                </a>
            </div>

            {{ Form::model($data['row'], ['route' => [$base_route.'update', $data['row']->id],'method' => 'put']) }}

            @include($view_path.'includes.main_form')

            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#name").keyup(function(){
            let name = $(this).val();
            let slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $("#slug").val(slug);
        });
    </script>
@endsection
