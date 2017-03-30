@extends('layouts.dashboard')

@section('content')
<div class="panel-heading">Add New Competition</div>
<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="">   
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title" class="col-md-2 control-label">title</label>
        <div class="col-md-9">
            <input id="title" type="text" class="form-control" name="title" value="{{old('title', isset($data->title) ? $data->title : '')}}" required autofocus>
            @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
        </div>
    </div> 
                                            

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="description" class="col-md-2 control-label">description</label>

        <div class="col-md-9">
            <div *ngIf="textareaInitialized">
                <textarea name="description" id="description">                        
                {{old('description', isset($data->description) ? $data->description : '')}}
                </textarea>
            </div>
            <script type="text/javascript">CKEDITOR.replace('description')</script>

            @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>
    </div> 

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="status" class="col-md-2 control-label">status</label>

        <div class="col-md-9">
            <input id="status" type="text" class="form-control" name="status" value="{{old('status', isset($data->status) ? $data->status : '')}}" required autofocus>

            @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div> 

    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
        <label for="start_date" class="col-md-2 control-label">start_date</label>

        <div class="col-md-9">
            <input id="start_date" type="date" class="form-control" name="start_date" value="{{old('start_date', isset($data->start_date) ? $data->start_date : '')}}" required autofocus>

            @if ($errors->has('start_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
    </div> 

    <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
        <label for="start_time" class="col-md-2 control-label">start_time</label>

        <div class="col-md-9">
            <input id="start_time" type="time" class="form-control" name="start_time" value="{{old('start_time', isset($data->start_time) ? $data->start_time : '')}}" required autofocus>

            @if ($errors->has('start_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_time') }}</strong>
                </span>
            @endif
        </div>
    </div> 
    
    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
        <label for="end_date" class="col-md-2 control-label">end_date</label>

        <div class="col-md-9">
            <input id="end_date" type="date" class="form-control" name="end_date" value="{{old('end_date', isset($data->end_date) ? $data->end_date : '')}}" required autofocus>

            @if ($errors->has('end_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_date') }}</strong>
                </span>
            @endif
        </div>
    </div> 

    <div class="form-group{{ $errors->has('end_time') ? ' has-error' : '' }}">
        <label for="end_time" class="col-md-2 control-label">end_time</label>

        <div class="col-md-9">
            <input id="end_time" type="time" class="form-control" name="end_time" value="{{old('end_time', isset($data->end_time) ? $data->end_time : '')}}" required autofocus>

            @if ($errors->has('end_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_time') }}</strong>
                </span>
            @endif
        </div>
    </div>                         

    <hr>
    <div class="form-group">
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</form>
@endsection
