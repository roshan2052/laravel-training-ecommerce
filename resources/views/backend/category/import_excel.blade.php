@extends('backend.layouts.master', ['page' => 'import'])

@section('title', 'import' . ' ' . $panel)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card">
                
                @include('backend.includes.flash_message')

                <div class="card-header">
                    <h3 class="card-title">Import {{ $panel }}</h3>
                    <a class="btn btn-info btn-md float-right" href="{{ route($base_route . 'index') }}">
                        <i class="fas fa-list"></i> List
                    </a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {{ Form::open(['route' => $base_route . 'import', 'method' => 'post', 'files' => true]) }}

                <div class="card-body">
                    <div class="form-group row mb-3">
                        {{ Form::label('file_name', 'File *', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-9">
                            {{ Form::file('file_name', null, ['class' => 'form-control']) }}
                            @include('backend.includes.validation_error_message', [
                                'fieldname' => 'file_name',
                            ])
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <!-- /.card-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
