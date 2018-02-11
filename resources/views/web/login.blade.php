@extends('web/layout/web_login')
@section('page_title', $page_title)

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@endsection

@section('content')
<div class="row nopadding">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label" for="email"><span class="fa-user-o fa"></span></label>
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email" placeholder="Username / Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pwd"><span class="fa fa-lock"></span></label>
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-left checkbox">
                            <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="ckb1"></label>
                            <label class="label-text100">Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-login">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row bottom-link">
    <div class="col-xs-12 col-sm-6 text-center">
        <a href="{{ route('password.request') }}">Forgot password ?</a>
    </div>
    <div class="col-xs-12 col-sm-6 text-center">
        <a href="{{ route('register') }}">Create an account</a>
    </div>
</div>
@endsection
