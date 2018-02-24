@extends('auth/layout/web_login')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')

<div class="row nopadding">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                @if($errors->has('email'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> {{ $errors->first('email') }}
                    </div>
                @elseif($errors->has('password'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> {{ $errors->first('password') }}
                    </div>
                @endif
                <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="form-label" for="email"><span class="fa-user-o fa"></span></label>
                        <div class="input-wrapper">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="@lang('Email Address')">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="form-label" for="pwd"><span class="fa fa-lock"></span></label>
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="pwd" placeholder="@lang('Password')" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-left checkbox">
                            <input type="checkbox" id="ckbl" class="input-checkbox100" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100"></label>
                            <label class="label-text100">@lang('Remember Me')</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="recaptcha"></div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-login">@lang('Login')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row bottom-link">
    <div class="col-xs-12 col-sm-6 text-center">
        <a href="{{ route('password.request') }}">@lang('Forgot password') ?</a>
    </div>
    <div class="col-xs-12 col-sm-6 text-center">
        <a href="{{ route('register') }}">@lang('Create an account')</a>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('.label-checkbox100, .label-text100').on('click', function(){
            var checkBoxes = $("#ckbl");
            checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        });
    });
</script>
<script type="text/javascript">
var verifyCallback = function(response) {
        alert(response);
        return false;
      };
  var onloadCallback = function() {
        grecaptcha.render('recaptcha', {
            'sitekey' : '6LdYTUgUAAAAAOnzCbtXofPUvV03D_I1z2Im5WQ1'
        });
  };
</script>
@endsection