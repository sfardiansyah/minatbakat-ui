@extends('layouts.dashboard')

@section('content')
<div class="panel-heading">Competition List</div>                                
<div class="panel-body">

<div class="table-responsive">
<table class="table table-bordered">
<tr>
<th>id</th>
<th>name</th>
<th>username</th>
<th>faculty</th>
<th>study_program</th>
<th>educational_program</th>
<th>competition_id</th>
<th>action</th>
</tr>
@foreach ($data as $row)
<tr>
<td>{!!$row->id!!}</td>    
<td>{!!$row->name!!}</td>
<td>{!!$row->username!!}</td>
<td>{!!$row->faculty!!}</td>
<td>{!!$row->study_program!!}</td>
<td>{!!$row->educational_program!!}</td>
<td>{!!$row->competition_id!!}</td>
<td><a type="button" class="btn btn-primary btn-sm" href="TODO">Hapus</a></td>
</tr>
@endforeach  
</table>
</div>
</div>
</div>
@endsection