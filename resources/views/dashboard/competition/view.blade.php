@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Competition List</div>                                
                <div class="panel-body">
                
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <tr>
                          <th>id</th>
                          <th>tile</th>
                          <th>description</th>
                          <th>status</th>
                          <th>start date</th>
                          <th>end date</th>
                          <th>created by</th>
                          <th>action</th>
                          </tr>
                          @foreach ($data as $row)
                          <tr>
                            <td>{!!$row->id!!}</td>    
                            <td>{!!$row->title!!}</td>
                            <td>{!!$row->description!!}</td>
                            <td>{!!$row->status!!}</td>
                            <td>{!!$row->start_date!!}</td>
                            <td>{!!$row->end_date!!}</td>
                            <td>{!!$row->owner!!}</td>
                            <td><a type="button" class="btn btn-primary btn-sm" href={{route('editCompetition', ['id' => $row->id])}}>Ubah</a></td>
                          </tr>
                          @endforeach  
                        </table>
                    </div>
                    <hr>
                    <a type="button" class="btn btn-primary" href="{{route('addCompetition')}}">Tambah Kompetisi</a>
                </div>
            </div>
        </div>
    </div>
</div>                      
@endsection