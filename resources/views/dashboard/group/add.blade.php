@extends('layouts.dashboard')

@section('content')
<div class="panel-heading">{{isset($data) ? 'Edit A Group' : 'Add New Group'}}</div>
<div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{old('name', isset($data->name) ? $data->name : '')}}" required autofocus>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div> 
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>
            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="{{old('description', isset($data->description) ? $data->description : '')}}" required autofocus>
                @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
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
@endsection
