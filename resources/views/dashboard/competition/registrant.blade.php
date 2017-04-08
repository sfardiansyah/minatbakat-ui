@extends('layouts.dashboard')

@section('page_title')
Pendaftar Kompetisi {{$title}}
@endsection

@section('content')
<div class="table-responsive">
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Akun LDAP</th>
      <th>Fakultas</th>
      <th>Program Studi</th>
      <th>Jenjang Program</th>      
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
      <td><a type="button" class="btn btn-primary btn-sm" href="TODO">Hapus</a></td>
    </tr>
    @endforeach  
  </table>
</div>
@endsection