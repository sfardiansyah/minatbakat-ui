<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;

use SSO\SSO;

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
            return view('unauthorized');

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
            return view('unauthorized');

        $competition->title = $request->title;        
        $competition->description = $request->description;
        $competition->status = $request->status;
        $competition->start_date = $request->start_date;
        $competition->end_date = $request->end_date;
        $competition->save();        
        return redirect(route('viewCompetition'));
    }  

    //user fails to register due to Auth Middleware
    protected function register($id) 
    {
        $competition = Competition::findOrFail($id);

        //check time eligibility        
        $current = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $start = new DateTime($competition->start_date, new DateTimeZone('Asia/Jakarta'));
        $stop = new DateTime($competition->end_date, new DateTimeZone('Asia/Jakarta'));
        
        if ($start > $current || $current >= $stop)
            return response()->json([
                    "message" => "invalid_time"
                ]);                

        //SSO authentication
        SSO::authenticate();
        $user = SSO::getUser();

        //avoid double registering
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
        } else {
            return response()->json([
                    "message" => "already_registered"
                ]);                
        }

        echo json_encode(["message"=>"success"]);
    }

    protected function registrantShow($id) {        
        $competition = Competition::findOrFail($id);        
        if (Gate::denies('content-access', $competition)) 
            return view('unauthorized');

        return view('dashboard.competition.registrant')->with([
            'data' => Registrant::where('competition_id', $id)->get(),
            'title' => $competition->title,
            ]);
    }
}