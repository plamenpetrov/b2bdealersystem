@extends('layout.main')

@section('content')

@include('partials.validator')
<script>
    $(document).ready(function () {

        $('form#form-productgroup').validator({
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
            <div class="col-lg-12">
                <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.create-edit-productgroup') !!}</h1>
            </div>

            {!! Form::model($productGroup,
            [
            'method' => 'POST',
            'url' => route('productgroups_save'),
            'id' => 'form-productgroup',
            'data-toggle' => 'validator'
            ]) 
            !!}

            {!! Form::token(); !!}

            {!! Form::hidden('id', null, ['class' => 'form-control input-lg']) !!}

            <div class="form-group">
                {!! Form::label('productgroup', trans('labels.name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Name', 'required' => '', 'data-error' => trans('labels.invalid-name')]) !!}
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










