<html>
<head>
    <title>daftar kompetisi</title>
</head>
<body>  
<a href="{{route('addCompetition')}}">tambah kompetisi</a></br>
<hr>
  @foreach ($data as $event)
    <table>    
    <tr><td>id</td><td>{!!$event->id!!}</td></tr>    
    <tr><td>title</td><td>{!!$event->title!!}</td></tr>
    <tr><td>description</td><td>{!!$event->description!!}</td></tr>
    <tr><td>status</td><td>{!!$event->status!!}</td></tr>
    <tr><td>start date</td><td>{!!$event->start_date!!}</td></tr>
    <tr><td>end date</td><td>{!!$event->end_date!!}</td></tr>
    </table>
    <a href={{route('editCompetition', ['id' => $event->id])}}>ubah</a>
    <hr>
  @endforeach
</body>
</html>