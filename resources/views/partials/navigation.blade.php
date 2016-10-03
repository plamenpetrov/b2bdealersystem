<nav class="navbar nav-justified navbar-default navbar-fixed-top">
    <div class="container">
        <nav class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Agredo</a>
        </nav>

        <nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li @if (Request::is('/*') || Request::is('cart')) class="active" @endif>
                     <a href="{!! route('home') !!}">{!! trans('labels.products') !!} <span class="sr-only">(current)</span></a>
                </li>
                <li @if (Request::is('nomenclature') || Request::is('company') || Request::is('person') || Request::is('product') || Request::is('productgroups/*')
                     || Request::is('company/*') || Request::is('person/*') || Request::is('product/*') || Request::is('productgroups')
                     ) class="active" @endif><a href="{!! route('nomenclature') !!}">{!! trans('labels.nomenclature') !!}</a></li>
                <li @if (Request::is('order') || Request::is('order/*')) class="active" @endif><a href="{!! route('order_index') !!}">{!! trans('labels.orders') !!}</a></li>
                <li @if (Request::is('report') || Request::is('report/*')) class="active" @endif>
                     <a href="{!! route('report_index') !!}">{!! trans('labels.reports') !!}</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{!! route('logout') !!}">{!! trans('labels.logout') !!}</a></li>
            </ul>
        </nav>
    </div>
</nav>