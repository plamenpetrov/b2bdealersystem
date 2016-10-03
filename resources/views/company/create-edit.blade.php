@extends('layout.main')

@section('content')

@include('partials.validator')
<script>
$(document).ready(function () {

    $('form#form-company').validator({
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
            <div class="col-lg-12">
                <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.create-edit-company') !!}</h1>
            </div>

            {!! Form::model($company,
            [
            'method' => 'POST',
            'url' => route('company_save'),
            'id' => 'form-company',
            'data-toggle' => 'validator'
            ]) 
            !!}

            {!! Form::token(); !!}

            {!! Form::hidden('id', null, ['class' => 'form-control input-lg']) !!}

            <div class="form-group">
                {!! Form::label('company', trans('labels.name'));!!}
                {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Name', 'required' => '', 'data-error' => trans('labels.invalid-name')]) !!}
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                {!! Form::label('company', trans('labels.email'));!!}
                {!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email', 'required' => '', 'data-error' => trans('labels.invalid-email')]) !!}
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                {!! Form::label('company', trans('labels.address'));!!}
                {!! Form::text('address', null, ['class' => 'form-control input-lg', 'placeholder' => 'Address', 'required' => '', 'data-error' => trans('labels.invalid-address')]) !!}
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                {!! Form::label('company', trans('labels.phone'));!!}
                {!! Form::text('phone', null, ['class' => 'form-control input-lg', 'placeholder' => 'Phone', 'required' => '', 'data-error' => trans('labels.invalid-phone')]) !!}
                <div class="help-block with-errors"></div>
            </div>

             <div class="form-group">
                {!! Form::label('company', trans('labels.eik'));!!}
                {!! Form::text('EIK', null, ['class' => 'form-control input-lg']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('company', trans('labels.country'));!!}
                {!! Form::select('id_country', arrayToSelectOptions($countries), null, ['class' => 'form-control input-lg']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('company', trans('labels.city'));!!}
                {!! Form::select('id_city', arrayToSelectOptions($cities), null, ['class' => 'form-control input-lg']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit(trans('labels.save'), ['class' => 'form-control input-lg btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@stop










