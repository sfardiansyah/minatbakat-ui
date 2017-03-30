<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;          

class ArticleController extends Controller
{
    private function validator($data) 
    {
        return Validator::make($data, [        
            'title' => 'required|max:255',
            'content' => 'required',            
            'status' => 'required|integer' ,
        ]);
    }
    protected function index() 
    {
        return view('dashboard.article.view')->with('data', Article::all());
    }

    protected function addShowForm() 
    {
        return view('dashboard.article.add');
    }

    protected function add(Request $request) 
    {
        $this->validator($request->all())->validate();
        
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'owner_id' => Auth::user()->id,
            'group_id' => Auth::user()->group_id,
            'status' => $request->status
        ]);

        return redirect(route('viewArticle'));
    }
}
