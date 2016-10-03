@extends('layout.main')

@section('content')

@include('partials.validator')
<script>
$(document).ready(function () {

    $('form#form-person').validator({
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            id_company: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
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
                <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.create-edit-person') !!}</h1>
            </div>

            {!! Form::model($person,
            [
            'method' => 'POST',
            'url' => route('person_save'),
            'id' => 'form-person',
            'data-toggle' => 'validator'
            ]) 
            !!}

            {!! Form::token(); !!}

            {!! Form::hidden('id', null, ['class' => 'form-control input-lg']) !!}

            <div class="form-group">
                {!! Form::label('person', trans('labels.name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Name', 'required' => '', 'data-error' => trans('labels.invalid-name')]) !!}
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                {!! Form::label('person', trans('labels.company')) !!}
                {!! Form::select('id_company', arrayToSelectOptions($companies), null, ['class' => 'form-control input-lg']) !!}
            </div>

             <div class="form-group">
                {!! Form::label('person', trans('labels.position')) !!}
                {!! Form::select('id_position', arrayToSelectOptions($positions), null, ['class' => 'form-control input-lg']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('person', trans('labels.email'));!!}
                {!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email', 'required' => '', 'data-error' => trans('labels.invalid-email')]) !!}
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                {!! Form::label('person', trans('labels.phone'));!!}
                {!! Form::text('phone', null, ['class' => 'form-control input-lg', 'placeholder' => 'Phone', 'required' => '', 'data-error' => trans('labels.invalid-phone')]) !!}
                <div class="help-block with-errors"></div>
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










