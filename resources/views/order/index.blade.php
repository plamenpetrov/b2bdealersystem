@extends('layout.main')

@section('content')

@include('partials.datatable')

<script>
    function showDialog(el)
    {
        event.preventDefault();
        var url = $(el).attr('href');

        $('#basicModal').modal({backdrop: 'static', keyboard: false})
                .one('click', '#delete', function () {
                    window.location = url;
                });
    }
</script>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Cancellate order</h4>
            </div>
            <div class="modal-body">
                <h3>Are you sure want to cancellate this order?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="delete" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.orders') !!}</h1>
            </div>

            <table class="list table table-striped" cellspacing="0" cellpadding="3">
                <thead>
                    <tr>
                        <th>{!! trans('labels.orders-no') !!}</th>
                        <th>{!! trans('labels.orders-date') !!}</th>
                        <th>{!! trans('labels.company') !!}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @if($orders)
                <tbody>
                    @foreach($orders as $key => $order)
                    <tr>
                        <td>{!! $order['docnum'] !!}</td>
                        <td>{!! $order['date'] !!}</td>
                        <td>{!! $order['company']['name'] !!}</td>
                        <td>
                            <a href="{!! route('order_show', $order['id']) !!}" > <span class="glyphicon glyphicon-eye-open btn btn-info"></span></a>
                        </td>
                        <td>
                            <a href="{!! route('orders_cancellation', $order['id']) !!}" onclick="showDialog(this)"> <span class="glyphicon glyphicon-remove btn btn-danger"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                @endif
            </table>
        </div>
    </div>
</div>
</div>
@stop










