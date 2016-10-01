@extends('layout.main')

@section('content')

@include('partials.validator')
<script>
$(document).ready(function () {

    $('form#productgroup-form').validator({
        rules: {
            name: {
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
            <h1 style="font-size: 22pt; text-align: center;">{!! trans('messages.productgroup-create-edit') !!}</h1>
        </div>

        {!! Form::model($productGroup,
        [
        'method' => 'POST',
        'url' => route('productgroups_save'),
        'id' => 'productgroup-form',
        'data-toggle' => 'validator'
        ]) 
        !!}

        {!! Form::token(); !!}

        {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
        
        <div class="form-group">
            {!! Form::label('productgroup', trans('messages.productgroup-name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => '', 'data-error' => trans('messages.productgroup-invalid-name')]) !!}
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










