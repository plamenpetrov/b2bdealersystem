@extends('layout.main')

@section('content')

@include('partials.datatable')
<div class="content">
    <div class="row">
        <div class="col-lg-11">
            <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.persons') !!}</h1>
        </div>
        <div class="col-lg-1">
            <a href="{!! route('person_add') !!}" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus"></span>
                {!! trans('labels.new') !!}
            </a>
        </div>

        <table class="list table table-striped" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th>{!! trans('labels.name') !!}</th>
                    <th>{!! trans('labels.company') !!}</th>
                    <th>{!! trans('labels.position') !!}</th>
                    <th>{!! trans('labels.phone') !!}</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @if($persons)
            <tbody>
                @foreach($persons as $key => $person)
                <tr>
                    <td>{!! $person['name'] !!}</td>
                    <td>{!! $person['company']['name'] !!}</td>
                    <td>{!! $person['position']['name'] !!}</td>
                    <td>{!! $person['phone'] !!}</td>
                    <td>
                        <a href="{!! route('person_edit', $person['id']) !!}" > <span class="glyphicon glyphicon-pencil btn btn-warning"></span></a>
                    </td>
                    <td>
                        <a href="{!! route('person_delete', $person['id']) !!}" > <span class="glyphicon glyphicon-remove btn btn-danger"></span></a>
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










