@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Horizontal Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
               {{ Form::open(['route' => 'test.store', 'method' => 'post']) }}

                @include('backend.test.includes.main_form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
