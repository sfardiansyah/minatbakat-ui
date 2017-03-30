<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;          

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }

    private function validator($data) {
        return Validator::make($data, [
            'name' => 'required|max:32',
            'description' => 'required|max:255',            
        ]);
    }

    protected function index() {
        if (Gate::denies('admin-access')) 
            return view('unauthorized');

        return view('dashboard.group.view')->with('data', Group::all());
    }  

    protected function addShowForm() 
    {
        if (Gate::denies('admin-access')) 
            return view('unauthorized');

        return view('dashboard.group.add');
    }

    protected function add(Request $request) 
    {   
        if (Gate::denies('admin-access')) 
            return view('unauthorized');                     

        $this->validator($request->all())->validate();
        Group::create([
            'name' => $request->name,
            'description' => $request->description,            
        ]);

        return redirect(route('viewGroup'));                    
    }

    protected function editShowForm($id) 
    {
        if (Gate::denies('admin-access')) 
            return view('unauthorized');

        $data = Group::findOrFail($id);
        return view('dashboard.group.add')->with('data', $data);
    }

    protected function edit(Request $request, $id) 
    {        
        if (Gate::denies('admin-access')) 
            return view('unauthorized');

        $this->validator($request->all())->validate();
        $row = Group::findOrFail($id);
        $row->name = $request->name;        
        $row->description = $request->description;        
        $row->save();        
        return redirect(route('viewGroup'));
    }  
}
