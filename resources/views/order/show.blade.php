@extends('layout.main')

@section('content')

<div class="col-lg-12 col_2">
    @if($titleData)
    <div style="padding: 20px;">

        <h3 style="text-align: center;padding: 20px;">
            {!! trans('labels.document') !!} <span class="title_docname">{!! trans('labels.order') !!}</span> №: {!! $titleData['docnum']!!}
        </h3>

        <table class="table table-condensed">
            <tbody>
                <tr>
                    <td>{!! trans('labels.orders-date') !!}</td>
                    <td class="title_docDate">{!! $titleData['date']!!}</td>
                </tr>

                <tr>
                    <td>{!! trans('labels.company') !!}</td>
                    <td class="title_name">{!! $titleData['company']['name'] !!}</td>
                </tr><tr>

                </tr><tr>
                    <td>{!! trans('labels.address') !!}</td>
                    <td class="title_name">{!! $titleData['company']['address'] !!}</td>
                </tr>

                <tr>
                    <td>{!! trans('labels.payment-type') !!}</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>{!! trans('labels.note') !!}</td>
                    <td>-</td>
                </tr><tr>	
                </tr>
            </tbody>
        </table>

        <div class="panel panel-default">
            <div class="panel-body" style="text-align: center;">
                {!! trans('labels.document-rows') !!}
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td><b>№</b></td>
                    <td><b>{!! trans('labels.product') !!}</b></td>
                    <td><b>{!! trans('labels.quantity') !!}</b></td>
                    <td><b>{!! trans('labels.price') !!}</b></td>
                    <td><b>{!! trans('labels.total') !!}</b></td>
                </tr>
            </thead>
            <tbody>
                @if($rowData)
                @foreach($rowData as $key => $row)
                <tr>
                    <td>{!! $key + 1 !!}</td>
                    <td>{!! $row['products']['name'] !!}</td>
                    <td>{!! $row['quantity'] !!}</td>
                    <td>2 лв. </td>
                    <td>{!! $row['quantity'] * 2 !!}</td>
                </tr>

                @endforeach
                @endif
            </tbody>
        </table>

        <input type="button" style="width: 100%; margin-bottom: 25px;" id="backBtn" class="btn btn-primary btn-lg" value="Към поръчките">

        <script>
            $(function ()
            {
                $("#backBtn").click(function () {
                    window.location = '{!! route('order_index') !!}';
                });
            });
        </script>
    </div>
</div>
@else 
Sorry!!! not found
@endif
@stop










