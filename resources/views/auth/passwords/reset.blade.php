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
                <input type="hidden" name="token" value="{{ $token }}">
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {{ $errors->first('email') }}
                    </div>
                @elseif($errors->has('password'))
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {{ $errors->first('password') }}
                    </div>
                @elseif ($errors->has('password_confirmation'))
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
                <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="form-label" for="email"><span class="fa-user-o fa"></span></label>
                        <div class="input-wrapper">
                            <input type="email" name="email" value="{{ $email or old('email') }}" class="form-control" id="email" placeholder="Email Address" autofocus required>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="form-label" for="pwd"><span class="fa fa-lock"></span></label>
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="pwd" placeholder="Password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="form-label" for="confirm_pwd"><span class="fa fa-lock"></span></label>
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="confirm_pwd" placeholder="Confirm Password" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-login">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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