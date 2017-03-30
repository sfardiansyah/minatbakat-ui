<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

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
        return view('dashboard.article.view')->with('data', Article::where('group_id', Auth::user()->group_id)->get());
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

    protected function editShowForm($id)     
    {
        $data = Article::findOrFail($id);        
        if (Gate::denies('content-access', $data))
            return view('unauthorized');        

        return view('dashboard.article.add')->with('data', $data);
    }

    protected function edit(Request $request, $id) {
        $this->validator($request->all())->validate();

        $article = Article::findOrFail($id);
        if (Gate::denies('content-access', $article))
            return view('unauthorized');

        $article->title = $request->title;
        $article->content = $request->content;
        $article->status = $request->status;
        $article->save();

        return redirect(route('viewArticle'));
    }
}
