<html>
<head>
    <title>daftar kompetisi</title>
</head>
<body>  
  @foreach ($data as $event)
    {{$event->id}}</br>
    {{$event->title}}</br>                          
    {{$event->description}}</br>
    {{$event->status}}</br>
    <hr>
  @endforeach
</body>
</html>