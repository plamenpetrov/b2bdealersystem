@extends('layout.main')

@section('content')

<div class="content">
    <div class="row">
                @if($reports)
                @foreach($reports as $report)
                <div class="col-md-12 report">
                    <a href="{!! route('report_view', $report['id']) !!}" class="tiles_info">
                        <div class="tiles-body plate-report"><strong>{!! trans('reports.' . $report['name']) !!}</strong></div>
                    </a>
                </div>
                <div class="clearfix"> </div>

                @endforeach
                @endif
    </div>
</div>

@stop










