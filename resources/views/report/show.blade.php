@extends('layout.main')

@section('content')
@include('partials.datatable')

<div class="content">
    <div class="row">
        <div class="col-md-12 report">
            {!! $data !!}
        </div>
    </div>
</div>

@stop










