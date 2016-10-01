@extends('layout.main')

@section('content')

@include('partials.validator')
<script>
$(document).ready(function () {

    $('form#company-form').validator({
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            address: {
                minlength: 2,
                required: true
            },
            phone: {
                minlength: 2,
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
        }
    });

});
</script>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1 style="font-size: 22pt; text-align: center;">Create/Edit Company</h1>
        </div>

        {!! Form::model($company,
        [
        'method' => 'POST',
        'url' => route('company_save'),
        'id' => 'company-form',
        'data-toggle' => 'validator'
        ]) 
        !!}

        {!! Form::token(); !!}

        {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
        
        <div class="form-group">
            {!! Form::label('company', trans('messages.company-name'));!!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => '', 'data-error' => trans('messages.company-invalid-name')]) !!}
            <div class="help-block with-errors"></div>
        </div>
        
        <div class="form-group">
            {!! Form::label('company', trans('messages.company-email'));!!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => '', 'data-error' => trans('messages.company-invalid-email')]) !!}
            <div class="help-block with-errors"></div>
        </div>
        
        <div class="form-group">
            {!! Form::label('company', trans('messages.company-address'));!!}
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required' => '', 'data-error' => trans('messages.company-invalid-address')]) !!}
            <div class="help-block with-errors"></div>
        </div>
        
        <div class="form-group">
            {!! Form::label('company', trans('messages.company-phone'));!!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone', 'required' => '', 'data-error' => trans('messages.company-invalid-phone')]) !!}
            <div class="help-block with-errors"></div>
        </div>
        
         <div class="form-group">
            {!! Form::label('company', trans('messages.company-eik'));!!}
            {!! Form::text('EIK', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('company', trans('messages.country'));!!}
            {!! Form::select('id_country', arrayToSelectOptions($countries), null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('company', trans('messages.city'));!!}
            {!! Form::select('id_city', arrayToSelectOptions($cities), null, ['class' => 'form-control']) !!}
        </div>
        

        <div class="form-group">
            {!! Form::submit(trans('messages.save'), ['class' => 'form-control btn btn-success']) !!}
        </div>
        
        {!! Form::close() !!}
    </div>
</div>
</div>
@stop










