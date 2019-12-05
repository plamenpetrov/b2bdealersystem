@extends('layout.main')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12 report">
            @if($filters)
                {!! Form::open(
                    [
                        'method' => $filters['method'],
                        'url' => route('report_show', $filters['id']),
                        'id' => 'form-report',
                        'data-toggle' => 'validator'
                    ]) 
                !!}

                <h1>{!! trans('reports.' . $filters['label']) !!}</h1>

                @foreach($filters['elements'] as $element)
                    <div class="form-group">
                        {!! Form::label('label', trans('reports.' . $element['label'])) !!}
                        {!! generateElement($element) !!}
                    </div>
                    <div class="clearfix"> </div>
                @endforeach

                <div class="form-group">
                    {!! Form::submit(trans('reports.check'), ['class' => 'form-control btn btn-info']) !!}
                </div>

                {!! Form::close() !!}

            @endif
        </div>
    </div>
</div>

@stop










