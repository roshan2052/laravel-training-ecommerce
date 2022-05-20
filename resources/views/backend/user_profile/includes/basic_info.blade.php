@if(isset($data['row']))
    {{ Form::model($data['row'], ['route' => [$base_route.'update_basic_info', $data['row']->id],'method' => 'post']) }}
@else
    {{ Form::open(['route' => $base_route . 'update_basic_info', 'method' => 'post', 'files' => true]) }}
@endif

<div class="form-group row mb-3">
    {{ Form::label('phone', 'Phone *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('phone',null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone']) }}
        @include('backend.includes.validation_error_message', ['fieldname' => 'phone',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('address', 'Address', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address']) }}
        @include('backend.includes.validation_error_message', ['fieldname' => 'address',])
    </div>
</div>


<div class="form-group row mb-3">
    {{ Form::label('dob', 'Date of Birth', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::date('dob', null, ['class' => 'form-control', 'id' => 'dob', 'placeholder' => 'Date of Birth']) }}
        @include('backend.includes.validation_error_message', ['fieldname' => 'dob',])
    </div>
</div>


<div class="form-group row mb-3">
    {{ Form::label('father_name', 'Father Name', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('father_name', null, ['class' => 'form-control', 'id' => 'father_name', 'placeholder' => 'Father Name']) }}
        @include('backend.includes.validation_error_message', ['fieldname' => 'father_name',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('mother_name', 'Mother Name', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('mother_name', null, ['class' => 'form-control', 'id' => 'mother_name', 'placeholder' => 'Mother Name']) }}
        @include('backend.includes.validation_error_message', ['fieldname' => 'mother_name',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('image_field', 'Image', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::file('image_field', null, ['class' => 'form-control', 'id' => 'image_field']) }}
        @include('backend.includes.validation_error_message', ['fieldname' => 'image_field',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('facebook_link', 'Facebook Link', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::url('facebook_link', null, ['class' => 'form-control', 'id' => 'facebook_link', 'placeholder' => 'Facebook Link']) }}
        @include('backend.includes.validation_error_message', ['fieldname' => 'facebook_link',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('short_bio', 'Short Bio', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::textarea('short_bio', null, ['class' => 'form-control', 'id' => 'short_bio', 'placeholder' => 'Short Bio', 'rows' => 3]) }}
        @include('backend.includes.validation_error_message', ['fieldname' => 'short_bio',])
    </div>
</div>



<button type="submit" class="btn btn-info">Submit</button>

{!! Form::close() !!}
