<?php

namespace App\Http\Controllers;

use SSO\SSO;

use App\User;
use App\Competition;
use App\Registrant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;          

class CompetitionController extends Controller
{      
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
        }
        return view('dashboard.competition.view')->with('data', $result);
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
        $query = Competition::where('id', $id)->get();                
        $tmp = explode(' ', $query[0]['start_date']);                
        $query[0]['start_date'] = $tmp[0];
        $query[0]['start_time'] = $tmp[1];        
        $tmp = explode(' ', $query[0]['end_date']);                
        $query[0]['end_date'] = $tmp[0];
        $query[0]['end_time'] = $tmp[1];                
        return view('dashboard.competition.add')->with('data', $query[0]);
    }

    protected function edit(Request $request, $id)
    {
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

    protected function register($id) 
    {
        $competition = Competition::findOrFail($id);
        SSO::authenticate();
        $user = SSO::getUser();

        $count = Registrant::where('username', $user->username)->count();
        if ($count == 0)
        {
            Registrant::create([                
                'username' => $user->username,
                'name' => $user->name,
                'npm' => $user->npm,          
                'faculty' => $user->faculty,
                'study_program' => $user->study_program,
                'educational_program' => $user->educational_program,
                'competition_id' => $id
            ]);
        }

        echo "registered";
    }

    protected function registrantShow($id) {
        return view('dashboard.competition.registrant')->with('data', Registrant::where('competition_id', $id)->get());
    }
}
