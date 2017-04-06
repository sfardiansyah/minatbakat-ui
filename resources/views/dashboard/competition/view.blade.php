@extends('layouts.dashboard')

@section('page_title')
Daftar Kompetisi
@endsection

@section('content')
<div class="table-responsive">
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Status</th>
      <th>Pendaftaran Dibuka</th>
      <th>Pendaftaran Ditututp</th>
      <th>Jumlah Pendaftar</th>
      <th>Oleh</th>
      <th>Aksi</th>
    </tr>
    @foreach ($data as $row)
    <tr>
      <td>{!!$row->id!!}</td>    
      <td>{!!$row->title!!}</td>
      <td>{!!$row->description!!}</td>
      <td>{!!$row->status!!}</td>
      <td>{!!$row->start_date!!}</td>
      <td>{!!$row->end_date!!}</td>
      <td>{!!$row->registrant_count!!}</td>
      <td>{!!$row->owner!!}</td>
      <td class="col-md-1">
        <a type="button" class="btn btn-primary btn-block btn-sm" href="{{route('editCompetition', ['id' => $row->id])}}">Ubah</a>
        <a type="button" class="btn btn-primary btn-block btn-sm" href="{{route('showRegistrantCompetition', ['id' => $row->id])}}">Data Pendaftar</a>
        <a type="button" class="btn btn-primary btn-block btn-sm" href="TODO">Hapus</a>
      </td>
    </tr>
    @endforeach  
  </table>
</div>
<hr>
<a type="button" class="btn btn-primary pull-right" href="{{route('addCompetition')}}">Tambah Kompetisi</a>
@endsection