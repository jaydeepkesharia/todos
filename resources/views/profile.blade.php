@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Update profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="/update/{{$user->id}}" aria-label="{{ __('Update profile') }}">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" placeholder="Email"  disabled>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="contact" type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ $user->contact }}" placeholder="Contact" required autofocus>

                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                Do you want to change password? &nbsp;
                                <input type="checkbox" id="chkPassword" onclick="EnableDisableTextBox(this)" />
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="txtPassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" disabled="disabled">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="txtPasswordcmf" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" disabled="disabled">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update task list') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function EnableDisableTextBox(chkPassword) {
        var txtPasswordcmf = document.getElementById("txtPasswordcmf");
        txtPasswordcmf.disabled = chkPassword.checked ? false : true;
        if (!txtPasswordcmf.disabled) {
            txtPasswordcmf.focus();
        }
        var txtPassword = document.getElementById("txtPassword");
        txtPassword.disabled = chkPassword.checked ? false : true;
        if (!txtPassword.disabled) {
            txtPassword.focus();
        }
    }
</script>
@endsection
