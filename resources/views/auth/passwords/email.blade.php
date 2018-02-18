@extends('auth/layout/web_login')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')

<div class="row nopadding">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                @if(session('status'))
                    <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                    </div>
                @elseif($errors->has('email'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> {{ $errors->first('email') }}
                            {{ session('status') }}
                    </div>
                @else
                    <div class="alert alert-info fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>info !</strong><br>@lang('info reset')
                    </div>
                @endif
                <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="form-label" for="email"><span class="fa-user-o fa"></span></label>
                        <div class="input-wrapper">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="@lang('Email Address')">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-login">@lang('Send Link')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row bottom-link">
    <div class="col-xs-12 col-sm-6 text-center">
        <a href="{{ route('login') }}">@lang('Login')</a>
    </div>
    <div class="col-xs-12 col-sm-6 text-center">
        <a href="{{ route('register') }}">@lang('Create an account')</a>
    </div>
</div>
@endsection

@section('javascript')
@endsection