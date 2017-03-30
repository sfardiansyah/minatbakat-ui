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
                                            
    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label for="content" class="col-md-2 control-label">content</label>

        <div class="col-md-9">
            <div *ngIf="textareaInitialized">
                <textarea name="content" id="content">                        
                {{old('content', isset($data->content) ? $data->content : '')}}
                </textarea>
            </div>
            <script type="text/javascript">CKEDITOR.replace('content')</script>

            @if ($errors->has('content'))
            <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
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
