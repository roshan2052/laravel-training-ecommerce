<div class="card-body">
    <div class="form-group row mb-3">
        {{ Form::label('name', 'Name *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'name'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('email', 'Email *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'email'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('image_field', 'Image', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::file('image_field', null, ['class' => 'form-control', 'id' => 'image_field']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'image_field'])
            @if(isset($data['row']->image))
                <img src="{{ asset('images/test/'.$data['row']->image) }}" alt="image" class="img-fluid" width="150px">
            @endif
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-info">Submit</button>
</div>
<!-- /.card-footer -->
