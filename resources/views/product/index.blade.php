@extends('layout.main')

@section('content')

@include('partials.datatable')
<div class="content">
    <div class="row">
        <div class="col-lg-11">
            <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.products') !!}</h1>
        </div>
        <div class="col-lg-1">
            <a href="{!! route('product_add') !!}" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus"></span>
                {!! trans('labels.new') !!}
            </a>
        </div>

        <table class="list table table-striped" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th>{!! trans('labels.name') !!}</th>
                    <th>{!! trans('labels.group') !!}</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @if($products)
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    <td>{!! $product['name'] !!}</td>
                    <td>{!! $product['productgroups']['name'] !!}</td>
                    <td>
                        <a href="{!! route('product_edit', $product['id']) !!}" > <span class="glyphicon glyphicon-pencil btn btn-warning"></span></a>
                    </td>
                    <td>
                        <a href="{!! route('product_delete', $product['id']) !!}" > <span class="glyphicon glyphicon-remove btn btn-danger"></span></a>
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










