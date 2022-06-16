@extends('backend.layouts.master',['page' => 'create'])

@section('title','create'.' '.$panel)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card">
                <div class="card-header">
                    <h3 class="card-title">List {{ $panel }}</h3>
                    <a class="btn btn-info btn-md float-right" href="{{ route($base_route.'index') }}">
                        <i class="fas fa-list"></i> List
                    </a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
               {{ Form::open(['route' => $base_route.'store', 'method' => 'post', 'files' => true]) }}

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
