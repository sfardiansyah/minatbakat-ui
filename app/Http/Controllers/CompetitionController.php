<?php

namespace App\Http\Controllers;

use App\User;
use App\Competition;
use App\Registrant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;          

class CompetitionController extends Controller
{      
    public function __construct() {
        $this->middleware('auth');
    }
    
    private function validator($data) 
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|integer',
            'start_date' => 'required|date',     
            'end_date' => 'required|date|after:start_date',            
        ]);
    }
    
    protected function index() 
    {            
        $result = Competition::where('group_id', Auth::user()->group_id)->get();
        foreach ($result as $row) 
        {
            $row['owner'] = User::where('id', $row['owner_id'])->get()[0]->name;            
            $row['registrant_count'] = Registrant::where('competition_id', $row['id'])->count();

            //show 100st caracther of the description
            $content_length = strlen($row['description']);
            $row['description'] = substr(strip_tags($row['description']), 0, min(150, $content_length)) . (($content_length > 100) ? '...' : '');
        }
        return view('dashboard.competition.view')->with(['data'=>$result, 'postname'=>'lol']);
    }

    protected function addShowForm() 
    {
        return view('dashboard.competition.add');                
    }

    protected function add(Request $request) 
    {        
        $request['start_date'] =  $request['start_date'] . ' ' . $request['start_time'];
        $request['end_date'] =  $request['end_date'] . ' ' . $request['end_time'];
        $this->validator($request->all())->validate();
        
        Competition::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'group_id' => Auth::user()->group_id,
            'owner_id' => Auth::user()->id
        ]);

        return redirect(route('viewCompetition'));
    }

    protected function editShowForm($id) 
    {            
        $query = Competition::findOrFail($id);
        if (Gate::denies('content-access', $query)) 
            return response('unauthorized access', 403);

        $tmp = explode(' ', $query['start_date']);                
        $query['start_date'] = $tmp[0];
        $query['start_time'] = $tmp[1];        
        $tmp = explode(' ', $query['end_date']);                
        $query['end_date'] = $tmp[0];
        $query['end_time'] = $tmp[1];                
        return view('dashboard.competition.add')->with('data', $query);
    }

    protected function edit(Request $request, $id)
    {
        $request['start_date'] =  $request['start_date'] . ' ' . $request['start_time'];
        $request['end_date'] =  $request['end_date'] . ' ' . $request['end_time'];
        $this->validator($request->all())->validate();

        $competition = Competition::findOrFail($id);        
        if (Gate::denies('content-access', $competition)) 
            return response('unauthorized access', 403);

        $competition->title = $request->title;        
        $competition->description = $request->description;
        $competition->status = $request->status;
        $competition->start_date = $request->start_date;
        $competition->end_date = $request->end_date;
        $competition->save();        
        return redirect(route('viewCompetition'));
    }     
}