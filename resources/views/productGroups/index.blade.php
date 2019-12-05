@extends('layout.main')

@section('content')

@include('partials.datatable')
<div class="content">
    <div class="row">
        <div class="col-lg-11">
            <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.productgroups') !!}</h1>
        </div>
        <div class="col-lg-1">
            <a href="{!! route('productgroups_add') !!}" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus"></span>
                {!! trans('labels.new') !!}
            </a>
        </div>

        <table class="list table table-striped" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th>{!! trans('labels.name') !!}</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @if($productGroups)
            <tbody>
                @foreach($productGroups as $key => $productGroup)
                <tr>
                    <td>{!! $productGroup['name'] !!}</td>
                    <td>
                        <a href="{!! route('productgroups_edit', $productGroup['id']) !!}" > <span class="glyphicon glyphicon-pencil btn btn-warning"></span></a>
                    </td>
                    <td>
                        <a href="{!! route('productgroups_delete', $productGroup['id']) !!}" > <span class="glyphicon glyphicon-remove btn btn-danger"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

            @endif
        </table>

    </div>
</div>
</div>
@stop










