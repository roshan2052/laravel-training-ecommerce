<div class="card-body">

    <div class="form-group row mb-3">
        {{ Form::label('parent_id', 'Parent', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('parent_id',$data['parents'],null, ['class' => 'form-control', 'id' => 'parent_id', 'placeholder' => 'Please Select Parent']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'parent_id'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('title', 'Title *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Title']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'title'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('rank', 'Rank *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('rank', null, ['class' => 'form-control', 'id' => 'rank', 'placeholder' => 'Rank']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'rank'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('route', 'Route *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('route', null, ['class' => 'form-control', 'id' => 'route', 'placeholder' => 'Route']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'route'])
        </div>
    </div>

    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('status', __('common.status'),["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('status', 1, true) }} Active </label>
            <label class="radio-inline">
            {{ Form::radio('status',0, false) }} In-Active </label>
        </div>
    </div>

</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-info">Submit</button>
</div>
<!-- /.card-footer -->
