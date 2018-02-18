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
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {{ $errors->first('name') }}
                    </div>
                @elseif($errors->has('email'))
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {{ $errors->first('email') }}
                    </div>
                @elseif($errors->has('password'))
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {{ $errors->first('password') }}
                    </div>
                @elseif($errors->has('vip_wallet'))
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {{ $errors->first('vip_wallet') }}
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
                            <input type="vipwallet" name="vip_wallet" value="{{ old('vipwallet') }}" class="form-control" id="vipwallet" placeholder="@lang('VIP Wallet ID')">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-login">@lang('Register')</button>
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

@section('javascript')
@endsection
