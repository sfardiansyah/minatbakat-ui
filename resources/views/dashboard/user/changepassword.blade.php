@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="old_password" class="col-md-4 control-label">old_password</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control" name="old_password" value="" required autofocus>

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                  

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-md-4 control-label">password_confirmation</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                  
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
