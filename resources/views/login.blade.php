@extends('layout.main')

@section('login')
<div class="row">
    <div class="col-lg-12">
        <section id="main">
            <section id="content">
                <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                    <div class="card">
                        <br>
                        <div class="card-header" style="text-align: center">
                            <img src="http://www.plant-protection.com/webresources/image/377/" style="width: 85px">
                        </div>

                        <div class="card-body card-padding" id="login-ch">
                            <p class="f-20 f-300 text-center">Welcome!</p>
                            <p class="text-muted text-center">Enter your username and password to sign in</p>


                            <form action="{!!URL::route('login_post')!!}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group fg-line">
                                    <input class="form-control" type="text" name="username" placeholder="Username">
                                    @if($errors->has('username'))
                                    {!!$errors->first('username')!!}
                                    @endif
                                </div>
                                <div class="form-group fg-line">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    @if($errors->has('password'))
                                    {!!$errors->first('password')!!}
                                    @endif

                                    <div class="form-group fg-line">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember">
                                                <i class="input-helper"></i>
                                                Remember me
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary btn-block m-t-10 waves-effect">Sign in</button>
                                    <hr>
                                    </form>

                                    <br>
                                </div>
                        </div>
                    </div>
            </section>
        </section>
    </div>
</div>
@stop










