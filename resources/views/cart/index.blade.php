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
            if(confirm('{!! trans('message.empty-cart') !!}')) {
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
        <div class="prod_list_top">
                <input type="button" style="width: 100%; margin-bottom: 25px;" id="home" class="btn btn-primary btn-lg" value="{!! trans('messages.home') !!}">
            </div>
        
        @if($cart)
            <h1 style="font-size: 22pt; text-align: center;">Нова поръчка</h1>
            <div class="alert alert-success" role="alert" style="text-align: center;">
                <span style="color: #000000; padding: 5px 0; font-family: calibri,verdana;">В количката има: <span class="cart">{!! $cartProducts !!}</span> продукта </span>
            </div>

            {!! Form::open([
            'method' => 'POST',
            'url' => route('cart_confirm'),
            'id' => 'confirm-cart'
            ]) !!}

            {!! Form::token(); !!}

            <div class="form-group">
                {!! Form::label('company', trans('messages.company'));!!}
                {!! Form::select('id_company', arrayToSelectOptions($companies), null, ['class' => 'confirm-cart', 'required' => '', 'data-error' => trans('messages.company-choose')]) !!}
            </div>

            <table class="prod_list table table-striped table-condensed" cellspacing="0" cellpadding="3">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($cart as $key => $row)
                <tbody class="categories">
                    <tr>
                        <td>{!! $row['products']['name'] !!}</td>
                        <td>{!! $row['quantity'] !!}</td>
                        <td>{!! $row['price'] !!}</td>
                        <td>
                            <a href="{!! route('cart_delete', $row['id']) !!}" > <span class="glyphicon glyphicon-remove btn btn-danger"></span></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            <div class="total_price well prices"><strong>{!! trans('messages.total') !!}: <span class="total">0</span></strong></div>
            <div class="price_taxes well prices"><strong>{!! trans('messages.total-quantity') !!}: <span class="total-quantity">0</span></strong></div>
            <div class="prod_list_info">
                <div class="btn-group btn-group-justified" style="margin-top: 80px;" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <input type='button' id="emptyCart" name='empty_cart' value='Изчисти' class='btn btn-danger btn-lg jcart-button' />
                    </div>
                    <div class="btn-group" role="group">
                        <input type="submit" value="Потвърди" class="btn btn-success btn-lg jcart-button" />
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
    @else
        <div class="alert alert-danger" role="alert" style="text-align: center;">
            <span style="color: #000000; padding: 5px 0; font-family: calibri,verdana;">
                {!! trans('messages.cart-empty') !!}
        </div>
    @endif
    </div>
</div>
</div>
@stop










