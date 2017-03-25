<form action="" method="POST">  
  {{csrf_field()}}
  title <input type="text" name="title" value="{{$data->title}}"> </br>
  description <input type="textarea" name="description" value="{{$data->description}}"> </br>
  status <input type="text" name="status" value="{{$data->status}}"> </br>
  mulai <input type="date" name="start_date" value="{{$data->start_date}}"> <input type="time" name="start_time" value="{{$data->start_time}}"> </br>
  akhir <input type="date" name="end_date" value="{{$data->end_date}}"> <input type="time" name="end_time" value="{{$data->end_time}}"> </br>
  <input type="submit">
</form>