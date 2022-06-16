@extends('backend.layouts.master',['page' => 'edit'])

@section('title', 'edit' . ' ' . $panel)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card">

                @include('backend.includes.flash_message')

                <div class="card-header">
                    <h3 class="card-title">Edit {{ $panel }}</h3>
                </div>

                {{ Form::model($data['row'], ['route' => [$base_route . 'update', $data['row']->id], 'method' => 'put','id' => 'main_form']) }}

                @include($view_path . 'includes.main_form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include($view_path.'includes.script')
@endsection

