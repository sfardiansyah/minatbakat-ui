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
      <th>Deskripsi</th>      
      <th>Aksi</th>
    </tr>
    @foreach ($data as $row)
    <tr>
      <td>{!!$row->id!!}</td>
      <td>{!!$row->name!!}</td>
      <td>{!!$row->description!!}</td>
      <td class="col-md-1">
        @if($row->id!=1)
        <a type="button" class="btn btn-primary btn-block btn-sm" href="{{route('editGroup', ['id' => $row->id])}}">Ubah</a>        
         <a type="button" class="btn btn-primary btn-block btn-sm" href="" onclick="event.preventDefault();document.getElementById('delete-group-{{$row->id}}').submit();">Hapus</a>        

          <form id="delete-group-{{$row->id}}" action="{{ route('deleteGroup', ['id'=>$row->id]) }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              <input type="hidden" value="{{$row->id}}" name="id">
          </form>
        @endif

      </td>
    </tr>
    @endforeach  
  </table>
</div>
<hr>
<a type="button" class="btn btn-primary pull-right" href="{{route('addGroup')}}">Tambah Grup</a>
@endsection
