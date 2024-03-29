@extends('layout.main')

@section('content')

@include('partials.datatable')
<div class="content">
    <div class="row">
        <div class="col-lg-11">
            <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.companies') !!}</h1>
        </div>
        <div class="col-lg-1">
            <a href="{!! route('company_add') !!}" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus"></span>
                {!! trans('labels.new') !!}
            </a>
        </div>

        <table class="list table table-striped" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th>{!! trans('labels.name') !!}</th>
                    <th>{!! trans('labels.address') !!}</th>
                    <th>{!! trans('labels.eik') !!}</th>
                    <th>{!! trans('labels.phone') !!}</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @if($companies)
            <tbody>
                @foreach($companies as $key => $company)
                <tr>
                    <td>{!! $company['name'] !!}</td>
                    <td>{!! $company['address'] !!}</td>
                    <td>{!! $company['EIK'] !!}</td>
                    <td>{!! $company['phone'] !!}</td>
                    <td>
                        <a href="{!! route('company_edit', $company['id']) !!}" > <span class="glyphicon glyphicon-pencil btn btn-warning"></span></a>
                    </td>
                    <td>
                        <a href="{!! route('company_delete', $company['id']) !!}" > <span class="glyphicon glyphicon-remove btn btn-danger"></span></a>
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










