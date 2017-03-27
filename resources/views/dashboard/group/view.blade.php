@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Group List</div>                                
                <div class="panel-body">
                
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <tr>
                          <th>id</th>
                          <th>name</th>
                          <th>description</th>
                          <th>actions</th>
                          </tr>
                          @foreach ($data as $row)
                          <tr>
                            <td>{!!$row->id!!}</td>
                            <td>{!!$row->name!!}</td>
                            <td>{!!$row->description!!}</td>
                            <td><a type="button" class="btn btn-primary btn-sm" href={{route('editGroup', ['id' => $row->id])}}>Ubah</a></td>
                          </tr>
                          @endforeach  
                        </table>
                    </div>
                    <hr>
                    <a type="button" class="btn btn-primary" href="{{route('addGroup')}}">Tambah Grup</a>
                </div>
            </div>
        </div>
    </div>
</div>                      
@endsection