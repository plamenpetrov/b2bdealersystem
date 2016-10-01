@extends('layout.main')

@section('content')

@include('partials.validator')
<script>
$(document).ready(function () {

    $('form#person-form').validator({
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
            <h1 style="font-size: 22pt; text-align: center;">{!! trans('messages.person-create-edit') !!}</h1>
        </div>

        {!! Form::model($person,
        [
        'method' => 'POST',
        'url' => route('person_save'),
        'id' => 'person-form',
        'data-toggle' => 'validator'
        ]) 
        !!}

        {!! Form::token(); !!}

        {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
        
        <div class="form-group">
            {!! Form::label('person', trans('messages.person-name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => '', 'data-error' => trans('messages.person-invalid-name')]) !!}
            <div class="help-block with-errors"></div>
        </div>
        
        <div class="form-group">
            {!! Form::label('person', trans('messages.company')) !!}
            {!! Form::select('id_company', arrayToSelectOptions($companies), null, ['class' => 'form-control']) !!}
        </div>
        
         <div class="form-group">
            {!! Form::label('person', trans('messages.position')) !!}
            {!! Form::select('id_position', arrayToSelectOptions($positions), null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('person', trans('messages.person-email'));!!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => '', 'data-error' => trans('messages.person-invalid-email')]) !!}
            <div class="help-block with-errors"></div>
        </div>
        
        <div class="form-group">
            {!! Form::label('person', trans('messages.person-phone'));!!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone', 'required' => '', 'data-error' => trans('messages.person-invalid-phone')]) !!}
            <div class="help-block with-errors"></div>
        </div>
        
        <div class="form-group">
            {!! Form::submit(trans('messages.save'), ['class' => 'form-control btn btn-success']) !!}
        </div>
        
        {!! Form::close() !!}
    </div>
</div>
</div>
@stop










