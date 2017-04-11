<?php

namespace App\Http\Controllers;

use App\File;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FileController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  protected function upload(Request $request) {    
    $valid = false;
    $ext = $request->upload->getClientOriginalExtension();        
    $allowed = ['jpg', 'jpeg', 'bmp', 'png', 'gif'];    

    foreach ($allowed as $item)
      if ($ext == $item) 
        $valid = true;          

    if ($valid) {
      $folder = public_path('media');
      $filename = Auth::user()->id.'_image_'.time().'.'.$ext;
      $request->file('upload')->move($folder, $filename);      
      return response()->json([
        "uploaded" => 1,
        "fileName" => $filename,
        "url" => url('media/'.$filename),
        ]);
    } else {
      return response()->json([
        "uploaded" => 0,        
        "error" => ["message"=>"unsupported filetypes"]
        ]);      
    }
  }
}
