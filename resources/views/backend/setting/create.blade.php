@extends('backend.layouts.master',['page' => 'create'])

@section('title','create'.' '.$panel)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card">
                <div class="card-header">
                    <h3 class="card-title">List {{ $panel }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
               {{ Form::open(['route' => $base_route.'store', 'method' => 'post', 'files' => true,'id' => 'main_form']) }}

                @include($view_path.'includes.main_form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include($view_path.'includes.script')
@endsection
