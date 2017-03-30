@extends('layouts.dashboard')

@section('content')
<div class="panel-heading">User List</div>                                
<div class="panel-body">
  <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>group_id</th>                          
          <th>action</th>
          </tr>
          @foreach ($data as $row)
          <tr>
            <td>{!!$row->id!!}</td>    
            <td>{!!$row->name!!}</td>
            <td>{!!$row->email!!}</td>
            <td>{!!$row->group_id!!}</td>                            
            <td><a type="button" class="btn btn-primary btn-sm" href={{route('editUser', ['id' => $row->id])}}>Ubah</a></td>
          </tr>
          @endforeach  
        </table>
    </div>
    <hr>
    <a type="button" class="btn btn-primary" href="{{route('addUser')}}">Tambah Pengguna</a>
</div>
@endsection