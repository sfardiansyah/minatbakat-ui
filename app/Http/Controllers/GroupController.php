<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;          

class GroupController extends Controller
{
    private function validator($data) {
        return Validator::make($data, [
            'name' => 'required|max:32',
            'description' => 'required|max:255',            
        ]);
    }

    protected function index() {
        return view('dashboard.group.view')->with('data', Group::all());
    }  

    protected function addShowForm() 
    {
        return view('dashboard.group.add');
    }

    protected function add(Request $request) 
    {                
        $this->validator($request->all())->validate();
        Group::create([
            'name' => $request->name,
            'description' => $request->description,            
        ]);

        return redirect(route('viewGroup'));
    }

    protected function editShowForm($id) 
    {
        return view('dashboard.group.add')->with('data', Group::where('id', $id)->get()[0]);
    }

    protected function edit(Request $request, $id) 
    {        
        $this->validator($request->all())->validate();
        $row = Group::find($id);
        $row->name = $request->name;        
        $row->description = $request->description;        
        $row->save();        
        return redirect(route('viewGroup'));
    }  
}
