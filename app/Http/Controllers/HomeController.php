<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;

class HomeController extends Controller
{    
    public function index()
    {
        return view('welcome');
    }

    public function viewCompetition() {            
      return view('competition')->with('data', Competition::all());
    }
}
