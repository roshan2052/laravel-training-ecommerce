<div class="card-body">

    <div class="form-group row mb-3">
        {{ Form::label('category_id', 'Category *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('category_id',$data['categories'], null, ['class' => 'form-control', 'id' => 'category_id', 'placeholder' => 'Please select category']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'category_id'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('name', 'Name *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'name'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('slug', 'Slug *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug', 'placeholder' => 'Slug']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'slug'])
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
        {{ Form::label('image_field', 'Image', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::file('image_field', null, ['class' => 'form-control', 'id' => 'image_field']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'image_field'])
            @if(isset($data['row']->image))
                <img src="{{ asset($img_path.$data['row']->image) }}" alt="image" class="img-fluid" width="100px" height="100px">
            @endif
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('short_description', 'Short Description', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::textarea('short_description', null, ['class' => 'form-control', 'id' => 'short_description', 'placeholder' => 'Short Description','rows' => 3]) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'short_description'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('long_description', 'Long Description', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::textarea('long_description', null, ['class' => 'form-control ckeditor', 'id' => 'long_description', 'placeholder' => 'Long Description']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'long_description'])
        </div>
    </div>

    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('status', 'Status',["class" => "radiostatus"]) }}
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
