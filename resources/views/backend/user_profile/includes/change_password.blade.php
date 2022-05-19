{{ Form::open(['route' => $base_route . 'update_password', 'method' => 'post', 'files' => true]) }}

<div class="form-group row mb-3">
    {{ Form::label('old_password', 'Old Password *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::password('old_password', ['class' => 'form-control', 'id' => 'old_password', 'placeholder' => 'Old Password']) }}
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('new_password', 'New Password *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::password('new_password', ['class' => 'form-control', 'id' => 'new_password', 'placeholder' => 'New Password']) }}
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('new_password_confirmation', 'Confirm New Password *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::password('new_password_confirmation', ['class' => 'form-control', 'id' => 'new_password_confirmation', 'placeholder' => 'Confirm New Password']) }}
    </div>
</div>

<button type="submit" class="btn btn-info">Submit</button>

{!! Form::close() !!}
