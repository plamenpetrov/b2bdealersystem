<div class="btn-group btn-group-justified cart-buttons" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-info btn-lg cart" href="{!! route('cart_index') !!}" onclick="javscript: window.location = $(this).attr('href');">
            <span class="cart">{!! $cartProducts !!}</span> {!! trans('messages.products') !!} </span>
        </button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default btn-lg" onclick="addAllProducts()">
            <span class="glyphicon glyphicon-refresh spinning"></span>   
            {!! trans('messages.add-all') !!}
        </button>
    </div>
</div>