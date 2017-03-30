@extends('layouts.dashboard')

@section('content')
<div class="panel-heading">Competition List</div>                                
<div class="panel-body">

<div class="table-responsive">
<table class="table table-bordered">
<tr>
<th>id</th>
<th>title</th>
<th>content</th>
<th>status</th>
<th>owner_id</th>
<th>group_id</th>
<th>action</th>
</tr>
@foreach ($data as $row)
<tr>
<td>{!!$row->id!!}</td>    
<td>{!!$row->title!!}</td>
<td>{!!$row->content!!}</td>
<td>{!!$row->status!!}</td>
<td>{!!$row->owner_id!!}</td>
<td>{!!$row->group_id!!}</td>
<td><a type="button" class="btn btn-primary btn-sm" href={{route('editArticle', ['id' => $row->id])}}>Ubah</a></td>
</tr>
@endforeach  
</table>
</div>
<hr>
<a type="button" class="btn btn-primary" href="{{route('addArticle')}}">Tambah artikel</a>
</div>
</div>
@endsection