@extends('layout.main')

@section('content')

<div class="content">
    <div class="row">
        <ul class="list-group">
            <li class="list-group-item">
                {!! link_to_route('company_index', 'Companies') !!}
            </li>
            <li class="list-group-item">
                {!! link_to_route('person_index', 'Person') !!}
            </li>
            <li class="list-group-item">
                {!! link_to_route('product_index', 'Products') !!}
            </li>
            <li class="list-group-item">
                {!! link_to_route('productgroups_index', 'Product groups') !!}
            </li>
        </ul>
    </div>
</div>
@stop










