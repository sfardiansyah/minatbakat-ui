@extends('layouts.dashboard')

@section('page_title')
Daftar Artikel
@endsection

@section('content')
<div class="table-responsive">
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Judul</th>
      <th>Konten Artikel</th>
      <th>Tanggal Diterbitkan</th>
      <th>Tanggal Diubah</th>
      <th>Status</th>
      <th>Oleh</th>
      <th>Aksi</th>
    </tr>
    @foreach ($data as $row)
    <tr>
      <td>{!!$row->id!!}</td>    
      <td>{!!$row->title!!}</td>
      <td>{!!$row->content!!}</td>
      <td>{!!$row->created_at!!}</td>
      <td>{!!$row->updated_at!!}</td>
      <td>{{($row->status == 1 ? "Diterbitkan" : "Disembunyikan")}}</td>
      <td>{!!$row->owner_id!!}</td>
      <td>
        <a type="button" class="btn btn-primary btn-block btn-sm" href="{{route('editArticle', ['id' => $row->id])}}">Ubah</a>        
        <a type="button" class="btn btn-primary btn-block btn-sm" href="" onclick="event.preventDefault();document.getElementById('delete-post-{{$row->id}}').submit();">Hapus</a>        

          <form id="delete-post-{{$row->id}}" action="{{ route('deleteArticle', ['id'=>$row->id]) }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              <input type="hidden" value="{{$row->id}}" name="id">
          </form>
      </td>
    </tr>
    @endforeach  
  </table>
</div>
<hr>
<a type="button" class="btn btn-primary pull-right" href="{{route('addArticle')}}">Tambah artikel</a>

@endsection