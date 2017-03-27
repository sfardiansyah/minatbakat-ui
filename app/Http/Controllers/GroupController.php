<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;          

class GroupController extends Controller
{
    protected function index() {
        return view('dashboard.group.view')->with('data', Group::all());
    }  

    protected function addForm() {
        return view('dashboard.group.add');
    }

    private function validator($data) {
        return Validator::make($data, [
            'name' => 'required|max:32',
            'description' => 'required|max:255',            
        ]);
    }

    public function add(Request $request) {                
        $this->validator($request->all())->validate();
        Group::create([
            'name' => $request->name,
            'description' => $request->description,            
        ]);

        return redirect(route('viewGroup'));
    }

    protected function editForm($id) {
        return view('dashboard.group.edit')->with('data', Group::where('id', $id)->get()[0]);
    }

    public function edit(Request $request, $id) {        
        $this->validator($request->all())->validate();

        $row = Group::find($id);
        $row->name = $request->name;        
        $row->description = $request->description;        
        $row->save();        
        return redirect(route('viewGroup'));
    }  
}
