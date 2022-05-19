@extends('backend.layouts.master',['page' => 'create'])

@section('title','create'.' '.$panel)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card">

                @include($view_path.'includes.main_form')

            </div>
        </div>
    </div>
@endsection

@section('js')
    @include($view_path.'includes.script')
@endsection
