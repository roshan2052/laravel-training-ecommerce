<div class="card-body">

    <div class="form-group row mb-3">
        {{ Form::label('category_id', 'Category *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('category_id',$data['categories'], null, ['class' => 'form-control', 'id' => 'category_id', 'placeholder' => 'Please select category']) }}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('sub_category_id', 'Sub Category *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('sub_category_id',$data['sub_categories'], null, ['class' => 'form-control', 'id' => 'sub_category_id', 'placeholder' => 'Please select sub-category']) }}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('name', 'Name *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
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
        {{ Form::label('tag_id', 'Tags *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('tag_id[]',$data['tags'],isset($data['row']) ? $data['row']->tags->pluck('id') : null, ['class' => 'form-control select2', 'id' => 'tag_id', 'multiple' => true]) }}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('code', 'Code *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('code', null, ['class' => 'form-control', 'id' => 'code', 'placeholder' => 'Code']) }}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('price', 'Price *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Price']) }}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('quantity', 'Quantity *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('quantity', null, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Quantity']) }}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('stock', 'Stock *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('stock', null, ['class' => 'form-control', 'id' => 'stock', 'placeholder' => 'Stock']) }}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('short_description', 'Short Description', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::textarea('short_description', null, ['class' => 'form-control', 'id' => 'short_description', 'placeholder' => 'Short Description','rows' => 3]) }}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('long_description', 'Long Description', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::textarea('long_description', null, ['class' => 'form-control ckeditor', 'id' => 'long_description', 'placeholder' => 'Long Description']) }}
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

    <table class="table table-striped table-bordered" id="attribute_wrapper">
        <tr>
            <th>Attribute</th>
            <th>Value</th>
            <th>Action</th>
        </tr>

        @if(isset($data['row']))
            @foreach($data['row']->productAttributeDetails as $product_attribute_detail)
                <tr>
                    <td>
                        {!! Form::select('attribute_id[]',$data['attributes'],$product_attribute_detail->attribute_id,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}
                        @include('backend.includes.validation_error_message',['fieldname' => 'attribute_id.*'])

                    </td>
                    <td>
                        {{ Form::text('attribute_value[]', $product_attribute_detail->value, ['class' => 'form-control', 'id' => 'stock', 'placeholder' => 'Enter Attribute Value']) }}
                    <td>
                        <a class="btn btn-block btn-danger sa-warning remove_row "><i class="fa fa-trash"></i></a>
                    </td>

                    {{ Form::hidden('product_attribute_detail_id[]', $product_attribute_detail->id) }}
                </tr>

            @endforeach
        @else
            <tr>
                <td>
                    {!! Form::select('attribute_id[]',$data['attributes'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}
                    @include('backend.includes.validation_error_message',['fieldname' => 'attribute_id.*'])

                </td>
                <td>
                    {{ Form::text('attribute_value[]',null, ['class' => 'form-control', 'id' => 'stock', 'placeholder' => 'Enter Attribute Value']) }}
                <td>
                    <a class="btn btn-block btn-danger sa-warning remove_attribute"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endif

    </table>

    <button class="btn btn-info" type="button" id="addMoreAttribute" style="margin-bottom: 20px">
        <i class="fa fa-plus"></i>
        Add
    </button>

    <table class="table table-striped table-bordered" id="image_wrapper">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>

        <tr>
            <td>
                {!! Form::file('image_field[]',null,['class' => 'form-control']) !!}
            </td>
            <td>
                {{ Form::text('name[]',null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Name']) }}
            <td>
                <a class="btn btn-block btn-danger sa-warning remove_image"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

    </table>

    <button class="btn btn-info" type="button" id="addMoreImage" style="margin-bottom: 20px">
        <i class="fa fa-plus"></i>
        Add
    </button>

</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-info">Submit</button>
</div>
<!-- /.card-footer -->
