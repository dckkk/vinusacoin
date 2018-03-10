@extends('auth/layout/web_login')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')

<div class="row nopadding">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                @if($errors->has('name'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> {{ $errors->first('name') }}
                    </div>
                @elseif($errors->has('email'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> {{ $errors->first('email') }}
                    </div>
                @elseif($errors->has('password'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> {{ $errors->first('password') }}
                    </div>
                @elseif($errors->has('vipwallet'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> {{ $errors->first('vipwallet') }}
                    </div>
                @elseif($errors->has('g-recaptcha-response'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> Please verify the Captcha !
                    </div>
                @endif
                <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="form-label" for="name"><span class="fa-user-o fa"></span></label>
                        <div class="input-wrapper">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="@lang('Your Name')">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="form-label" for="email"><span class="fa-envelope-o fa"></span></label>
                        <div class="input-wrapper">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="@lang('Email Address')">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="form-label" for="password"><span class="fa-lock fa"></span></label>
                        <div class="input-wrapper">
                            <input type="password" name="password" class="form-control" id="password" placeholder="@lang('Password')">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="form-label" for="password_confirmation"><span class="fa-lock fa"></span></label>
                        <div class="input-wrapper">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="@lang('Confirm Password')">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('vipwallet') ? ' has-error' : '' }}">
                        <label class="form-label" for="vipwallet"><span class="fa-id-card-o fa"></span></label>
                        <div class="input-wrapper">
                            <input type="vipwallet" name="vipwallet" value="{{ old('vipwallet') }}" class="form-control" id="vipwallet" placeholder="@lang('Your Wallet ETH')">
                        </div>
                    </div>
                    <div class="fom-group">
                        <div id="recaptcha"></div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="accept_term" id="accept_term" value="true">
                                    Accept  <a href="#as" data-toggle="modal" data-target="#terms_content" id="check_terms">Terms and Conditions</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" id="button_submit" disabled class="btn btn-login">@lang('Register')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row bottom-link">
    <div class="col-xs-12 text-center">
        @lang('Already have account') ? <a href="{{ route('login') }}">@lang('Sign in Now')</a>
    </div>
</div>
@endsection


@section('modal_content')
<div id="terms_content" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Terms and Condition</h3>
            </div>
            <div class="modal-body">
                {!! __('term_condition.content') !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
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

        $("#accept_term").on('change', function(){
            document.getElementById('button_submit').disabled = !this.checked;
        });
    </script>
@endsection
