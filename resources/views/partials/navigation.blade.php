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
                <li class="active">
                    <a href="{!! route('home') !!}">Products <span class="sr-only">(current)</span></a>
                </li>
                <li><a href="{!! route('nomenclature') !!}">Nomenclature</a></li>
                <li><a href="{!! route('order_index') !!}">Orders</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{!! route('logout') !!}">Logout</a></li>
            </ul>
        </nav>
    </div>
</nav>