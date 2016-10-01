@extends('layout.main')

@section('login')
<div class="row">
    <section id="main">
        <section id="content">
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="well bs-component login-panel panel panel-default ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{!!URL::route('login_post')!!}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="field">
                                <label for="username" class="col-lg-4 control-label">{!! Lang::get('messages.username'); !!}</label>
                                <input class="form-control" type="text" name="username">
                                @if($errors->has('username'))
                                {!!$errors->first('username')!!}
                                @endif
                            </div>
                            <div class="field">
                                <label for="password" class="col-lg-4 control-label">{!! Lang::get('messages.password'); !!}</label>
                                <input class="form-control" type="password" name="password">
                                @if($errors->has('password'))
                                {!!$errors->first('password')!!}
                                @endif
                            </div>
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="{!! Lang::get('messages.loginbtn'); !!}">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
@stop










