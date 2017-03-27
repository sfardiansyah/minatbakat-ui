<?php

namespace App\Http\Controllers;

use App\User;
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

}
