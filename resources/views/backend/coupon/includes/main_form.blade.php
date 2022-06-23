<div class="card-body">
    <div class="form-group row mb-3">
        {{ Form::label('title','Title', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Name']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'title'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('code', 'Code *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('code', $data['code'] ?? $data['row']->code , ['class' => 'form-control', 'id' => 'code', 'placeholder' => 'Code','readonly' => $data['disabled_code'] ]) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'code'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('start_date', 'Start Date *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::date('start_date',now(), ['class' => 'form-control', 'id' => 'start_date']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'start_date'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('expire_date', 'Expire Date *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::date('expire_date', now()->addDay(7), ['class' => 'form-control', 'id' => 'expire_date']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'expire_date'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('discount_amount', 'Discount Amount *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('discount_amount', null, ['class' => 'form-control', 'id' => 'discount_amount', 'placeholder' => 'Discount Amount']) }}
            @include('backend.includes.validation_error_message',['fieldname' => 'discount_amount'])
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
