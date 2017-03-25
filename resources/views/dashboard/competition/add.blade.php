<form action="" method="POST">
  {{csrf_field()}}
  @if ($errors->has('title')) 
  <strong>Error: {{ $errors->first('title') }}</strong></br>
  @endif  
  title <input type="text" name="title"> </br>
  @if ($errors->has('description')) 
  <strong>Error: {{ $errors->first('description') }}</strong></br>
  @endif  
  description <input type="textarea" name="description"> </br>
  @if ($errors->has('status')) 
  <strong>Error: {{ $errors->first('status') }}</strong></br>
  @endif  
  status <input type="text" name="status"> </br>
  @if ($errors->has('start_date')) 
  <strong>Error: {{ $errors->first('start_date') }}</strong></br>
  @endif  
  mulai <input type="date" name="start_date"> <input type="time" name="start_time"> </br>
  @if ($errors->has('end_date')) 
  <strong>Error: {{ $errors->first('end_date') }}</strong></br>
  @endif  
  akhir <input type="date" name="end_date"> <input type="time" name="end_time"> </br>
  <input type="submit">
</form>