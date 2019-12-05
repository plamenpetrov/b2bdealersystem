@extends('layout.main')

@section('content')

@include('partials.validator')

<script>

    $(function () {
    $(document).on('click', "table.prod_list tbody.categories", function () {
    if ($(this).children().hasClass('rowGroupActive')) {
    $(this).children().removeClass('rowGroupActive')
    } else {
    $(this).children().addClass('rowGroupActive')
    }
    $(this).next("table.prod_list tbody.body-product-rows").toggle();
    });
    $(document).on('click', ".inc", function () {
    var val = $(this).parent().children("input").val();
    if (val)
    {
    $(this).parent().children("input").val(parseFloat(val) + 1);
    $(this).parent().children("input").change();
    } else {
    $(this).parent().children("input").val(1);
    $(this).parent().children("input").change();
    }
    });
    $(document).on('click', ".dec", function () {
    var val = $(this).parent().children("input").val();
    if (val)
    {
    var newval = parseFloat(val) - 1;
    if (newval < 0) {
    $(this).parent().children("input").val(0);
    $(this).parent().children("input").change();
    } else {
    $(this).parent().children("input").val(newval);
    $(this).parent().children("input").change();
    }
    } else {
    $(this).parent().children("input").val(0);
    $(this).parent().children("input").change();
    }
    });
    $(document).on('click', "#emptyCart", function () {
    if (confirm('{!! trans('message.empty-cart') !!}')) {
    window.location = '{!! route('cart_empty') !!}';
    }
    });
    $(document).on('click', "#home", function () {
    window.location = '{!! route('home') !!}';
    });
    $('form#confirm-cart').validator({
    rules: {
    id_company: {
    required: true
    }
    },
            highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function (element) {
            element.text('OK!').addClass('valid')
                    .closest('.control-group').removeClass('error').addClass('success');
            }
    });
    });

</script>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="prod_list_top">
                <input type="button" style="width: 100%; margin-bottom: 25px;" id="home" class="btn btn-primary btn-lg" value="{!! trans('labels.products') !!}">
            </div>

            @if($cart)
            <h1 style="font-size: 22pt; text-align: center;">{!! trans('labels.new-order') !!}</h1>
            <div class="alert alert-success" role="alert" style="text-align: center;">
                <span style="color: #000000; padding: 5px 0; font-family: calibri,verdana;">{!! trans('labels.cart-products') !!}: <span class="cart">{!! $cartProducts !!}</span> {!! trans('labels.products') !!} </span>
            </div>

            {!! Form::open([
            'method' => 'POST',
            'url' => route('cart_confirm'),
            'id' => 'confirm-cart'
            ]) !!}

            {!! Form::token(); !!}

            <div class="form-group">
                {!! Form::label('company', trans('labels.company'));!!}
                {!! Form::select('id_company', arrayToSelectOptions($companies), null, ['class' => 'form-control input-lg confirm-cart', 'required' => '', 'data-error' => trans('labels.company-choose')]) !!}
            </div>

            <table class="prod_list table table-striped table-condensed" cellspacing="0" cellpadding="3">
                <thead>
                    <tr>
                        <th>{!! trans('labels.product') !!}</th>
                        <th>{!! trans('labels.quantity') !!}</th>
                        <th>{!! trans('labels.price') !!}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="categories">
                @foreach($cart as $key => $row)
                
                    <tr>
                        <td>{!! $row['products']['name'] !!}</td>
                        <td>{!! $row['quantity'] !!}</td>
                        <td>{!! $row['price'] !!}</td>
                        <td>
                            <a href="{!! route('cart_delete', $row['id']) !!}" > <span class="glyphicon glyphicon-remove btn btn-lg btn-danger"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <ul class="list-group">
                <li class="list-group-item">
                    <strong>{!! trans('labels.total') !!}: </strong>
                    <span class="badge">0</span>
                </li>
                <li class="list-group-item">
                    <strong>{!! trans('labels.total-quantity') !!}:</strong> 
                    <span class="badge">{!! $quantityTotal !!}</span>
                </li>
            </ul>

            <div class="prod_list_info">
                <div class="btn-group btn-group-justified" style="margin-top: 80px;" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <input type="button" id="emptyCart" name="empty_cart" value="{!! trans('labels.empty') !!}" class="btn btn-danger btn-lg jcart-button" />
                    </div>
                    <div class="btn-group" role="group">
                        <input type="submit" value="{!! trans('labels.confirm') !!}" class="btn btn-success btn-lg jcart-button" />
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
            @else
            <div class="alert alert-danger" role="alert" style="text-align: center;">
                <strong>{!! trans('labels.cart-empty') !!}</strong>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@stop










