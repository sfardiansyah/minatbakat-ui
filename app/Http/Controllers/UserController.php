<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;          

class UserController extends Controller
{     
    protected function index() {
      return view('dashboard.user.view')->with('data', User::all());
    }

    protected function changePasswordForm() {
      return view('dashboard.user.changepassword');
    }

    protected function changePassword(Request $request) {            
      Validator::extend('passcheck', function ($attribute, $value, $parameters) {
          return Hash::check($value, Auth::user()->password);
      });

      Validator::make($request->all(), [
        'old_password' => 'passcheck',
        'password' => 'required|min:6|confirmed'
      ])->validate();

      $user = User::find(Auth::user()->id);
      $user->password = bcrypt($request->password);
      $user->save();
      return redirect(route('dashboard'));
    }

    protected function addForm() {      
      return view('dashboard.user.add')->with('groups', Group::all());
    }    

    protected function add(Request $request) {
      Validator::make($request->all(), [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
          'group_id' => 'required|exists:groups,id'
      ])->validate();

      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'group_id' => $request->group_id
      ]);    

      return redirect(route('viewUser'));
    }
}
