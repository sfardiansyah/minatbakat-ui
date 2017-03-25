<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;          

class CompetitionController extends Controller
{    
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    private function validator($data) {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|integer',
            'start_date' => 'required|date',     
            'end_date' => 'required|date|after:start_date',            
        ]);
    }

    /*
    * returns competition dashboard index page
    */
    public function index() {
        return view('dashboard.competition.view')->with('data', Competition::all());
    }

    /*
    * returns form to add new competition
    */
    public function addForm() {
        return view('dashboard.competition.add');
    }

    /*
    * add competition to database
    */
    public function add(Request $request) {        
        $request['start_date'] =  $request['start_date'] . ' ' . $request['start_time'];
        $request['end_date'] =  $request['end_date'] . ' ' . $request['end_time'];
        $this->validator($request->all())->validate();
        
        Competition::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect(route('viewCompetition'));
    }

    /*
    * returns form to edit a competition
    */
    public function editForm($id) {        
        $query = Competition::where('id', $id)->get();                
        $tmp = explode(' ', $query[0]['start_date']);                
        $query[0]['start_date'] = $tmp[0];
        $query[0]['start_time'] = $tmp[1];        
        $tmp = explode(' ', $query[0]['end_date']);                
        $query[0]['end_date'] = $tmp[0];
        $query[0]['end_time'] = $tmp[1];                
        return view('dashboard.competition.edit')->with('data', $query[0]);
    }

    /*
    * save changes to database
    */
    public function edit(Request $request, $id) {
        $request['start_date'] =  $request['start_date'] . ' ' . $request['start_time'];
        $request['end_date'] =  $request['end_date'] . ' ' . $request['end_time'];
        $this->validator($request->all())->validate();

        $competition = Competition::find($id);
        $competition->title = $request->title;        
        $competition->description = $request->description;
        $competition->status = $request->status;
        $competition->start_date = $request->start_date;
        $competition->end_date = $request->end_date;
        $competition->save();        
        return redirect(route('viewCompetition'));
    }  
}
