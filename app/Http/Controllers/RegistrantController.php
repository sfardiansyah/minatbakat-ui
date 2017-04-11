<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;
use DateTimeZone;

use SSO\SSO;

use App\Registrant;
use App\Competition;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RegistrantController extends Controller
{
    protected function register($id) 
    {
        $competition = Competition::findOrFail($id);

        if ($competition->status != 1) { //is not opened
            echo json_encode(["message"=>"not_open_for_registration"]);
        }
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

    protected function registrantShow($id) 
    {        
        $competition = Competition::findOrFail($id);        
        if (Gate::denies('content-access', $competition)) 
            return response('unauthorized access', 403);

        return view('dashboard.competition.registrant')->with([
            'data' => Registrant::where('competition_id', $id)->get(),
            'title' => $competition->title,
            ]);
    }
}
