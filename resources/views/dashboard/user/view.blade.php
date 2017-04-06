@extends('layouts.dashboard')

@section('page_title')
Daftar Grup
@endsection

@section('content')
<div class="table-responsive">
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Email</th>      
      <th>ID Grup</th>
      <th>Aksi</th>
    </tr>
    @foreach ($data as $row)
    <tr>
      <td>{!!$row->id!!}</td>    
      <td>{!!$row->name!!}</td>
      <td>{!!$row->email!!}</td>
      <td>{!!$row->group_id!!}</td>                            
      <td class="col-md-1">        
        <a type="button" class="btn btn-primary btn-block btn-sm" href="TODO">Hapus</a>
      </td>
    </tr>
    @endforeach  
  </table>
</div>
<hr>
<a type="button" class="btn btn-primary pull-right" href="{{route('addUser')}}">Tambah Grup</a>
@endsection

                      