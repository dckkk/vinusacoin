@extends('auth/layout/web_login')
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
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {{ $errors->first('email') }}
                    </div>
                @elseif($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="form-label" for="email"><span class="fa-user-o fa"></span></label>
                        <div class="input-wrapper">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="form-label" for="pwd"><span class="fa fa-lock"></span></label>
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="pwd" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-left checkbox">
                            <input type="checkbox" id="ckbl" class="input-checkbox100" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100"></label>
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

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('.label-checkbox100, .label-text100').on('click', function(){
            var checkBoxes = $("#ckbl");
            checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        });
    });
</script>
@endsection