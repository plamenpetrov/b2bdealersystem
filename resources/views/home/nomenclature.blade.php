@extends('layout.main')

@section('content')

<div class="content">
    <div class="row">

        <div class="col_2">
            <div class="box_1">
                <div class="col-md-6 col_1_of_2 span_1_of_2">
                    <a href="{!! route('company_index') !!}" class="tiles_info">
                        <div class="tiles-head plate-companies1">
                            <div class="text-center">
                                {!! trans('labels.companies') !!}
                            </div>
                        </div>
                        <div class="tiles-body plate-companies">{!! $companies !!}</div>
                    </a>
                </div>
                <div class="col-md-6 col_1_of_2 span_1_of_2">
                    <a href="{!! route('person_index') !!}" class="tiles_info">
                        <div class="tiles-head plate-person1">
                            <div class="text-center">
                                {!! trans('labels.persons') !!}
                            </div>
                        </div>
                        <div class="tiles-body plate-person">{!! $persons !!}</div>
                    </a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="box_1">
                <div class="col-md-6 col_1_of_2 span_1_of_2">
                    <a href="{!! route('product_index') !!}" class="tiles_info">
                        <div class="tiles-head plate-products1">
                            <div class="text-center">
                                {!! trans('labels.products') !!}
                            </div>
                        </div>
                        <div class="tiles-body plate-products">{!! $products !!}</div>
                    </a>
                </div>
                <div class="col-md-6 col_1_of_2 span_1_of_2">
                    <a href="{!! route('productgroups_index') !!}" class="tiles_info">
                        <div class="tiles-head plate-productgroups1">
                            <div class="text-center">
                                {!! trans('labels.productgroups') !!}
                            </div>
                        </div>
                        <div class="tiles-body plate-productgroups">{!! $productGroups !!}</div>
                    </a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>

@stop










