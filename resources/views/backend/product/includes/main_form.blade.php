<div class="card-body">

    <div class="form-group row mb-3">
        {{ Form::label('category_id', 'Category *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('category_id',$data['categories'], null, ['class' => 'form-control', 'id' => 'category_id', 'placeholder' => 'Please select category']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'category_id'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('sub_category_id', 'Sub Category *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('sub_category_id',$data['sub_categories'], null, ['class' => 'form-control', 'id' => 'sub_category_id', 'placeholder' => 'Please select sub-category']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'sub_category_id'])
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
        {{ Form::label('code', 'Code *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('code', null, ['class' => 'form-control', 'id' => 'code', 'placeholder' => 'Code']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'code'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('price', 'Price *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Price']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'price'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('quantity', 'Quantity *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('quantity', null, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Quantity']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'quantity'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('stock', 'Stock *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('stock', null, ['class' => 'form-control', 'id' => 'stock', 'placeholder' => 'Stock']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'stock'])
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
