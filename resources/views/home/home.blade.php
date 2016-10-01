@extends('layout.main')

@section('content')

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

    });

    function addAllProducts()
    {
        $('.spinning').fadeIn();
        var data = $("tr.product-rows");
        var newdata = new Array();
        var cart = new Object();
        var flag = false;

        $.each(data, function (i, e)
        {
            newdata = $(e).children().children().serializeArray();
            //if(/^\d+$/.test(newdata[i][0].value) && newdata[i][0].value>0 && /^\d+$/.test(newdata[i][1].value))
            if (newdata[0].value > 0)
            {
                cart[i] = new Object();
                cart[i].quantity = newdata[0].value;
                cart[i].id_product = newdata[1].value;
                flag = true;
            }
        });

        //console.dir(flag);
        //console.dir(cart);
        //$("input[type=number]").val(0);

        if (flag)
        {
            var url = '{!! route("cart_save") !!}';

            $.ajax({
                url: url,
                type: 'POST',
                data: cart,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (cartdata) {
                if (cartdata.number) {

                    $("input[type=number]").val(0);

                    $("span.cart").html(cartdata.number);
                    $('.spinning').fadeOut();

                    $.bootstrapGrowl('{!! trans('messages.add - to - cart - success') !!}', {
                        ele: 'body', // which element to append to
                        type: 'success', // (null, 'info', 'danger', 'success')
                        offset: {from: 'top', amount: 40}, // 'top', or 'bottom'
                        align: 'right', // ('left', 'right', or 'center')
                        width: 'auto', // (integer, or 'auto')
                        delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                        stackup_spacing: 10 // spacing between consecutively stacked growls.
                    });
                } else {
                    alert('Error add');
                    $('.spinning').fadeOut();
                }
            }).fail(function (fail) {
                console.log(fail);
            });
        } else {
            $('.spinning').fadeOut();
        }


    }
</script>

<div class="content">
    <div class="row">
        
        @include('partials.cartbuttons', [$cartProducts])

        <table class="prod_list table table-striped table-condensed" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            @if($products)
            @foreach($products as $key => $productGroup)
            <tbody class="categories">
                <tr>
                    <td colspan="4">{!! $productGroup['name'] !!}</td>
                </tr>
            </tbody>
            <tbody class="body-product-rows">
                @foreach($productGroup['products'] as $k => $product)
                <tr class="product-rows">
                    <td>{!! $product['id'] !!}</td>
                    <td>{!! $product['name'] !!}</td>
                    <td>1</td>
                    <td>
                        <span class="inc btn btn-default glyphicon glyphicon-chevron-up" style="margin: 0 auto;"></span>
                        <input type="number" class="quantity" name="quantity" value="">
                        <span class="dec btn btn-default glyphicon glyphicon-chevron-down" style="margin: 0 auto;"></span>

                        <input type="hidden" class="product" name="id_product" value="{!! $product['id'] !!}">
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endforeach
            @endif
        </table>
    </div>
</div>
@stop










