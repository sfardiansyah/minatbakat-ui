<?php

namespace App\Http\Controllers;

use App\User;
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
            'status' => 'required|integer',
            'headline' => 'sometimes|mimes:jpg,jpeg,bmp,png',
        ]);
    }

    /**
        List all entries with status > 0.        
    */
    protected function index() 
    {
        //fetch all entries
        $rows = Article::where('group_id', Auth::user()->group_id)->where('status', '>=', 1)->get();        
        foreach ($rows as $row) 
        {            
            $row['owner_id'] = User::findOrFail($row['owner_id'])->name;

            //show 100st caracther of the description
            $content_length = strlen($row['content']);
            $row['content'] = substr(strip_tags($row['content']), 0, min(150, $content_length)) . (($content_length > 100) ? '...' : '');
        }
        return view('dashboard.article.view')->with('data', $rows);
    }

    /**
        Shows add post form.

        @param $request request
    */
    protected function addShowForm() 
    {
        return view('dashboard.article.add');
    }

    /**
        Returns image file path after saving. or empty string if the image is violating rules.

        @param $image image file
        @return file path relative to website root
    */
    private function processImage($image) {
        if (!$image) 
            return ''; //discard image

        $valid = false;
        $ext = $image->getClientOriginalExtension();        
        $allowed = ['jpg', 'jpeg', 'bmp', 'png', 'gif'];    

        foreach ($allowed as $item)
            if ($ext == $item) 
                $valid = true;          
                
        if (!$valid) 
            return ''; //discard image
        
        $folder = public_path('media');
        $filename = Auth::user()->id.'_image_'.time().'.'.$ext;
        $image->move($folder, $filename);                 
        return url('media/' . $filename);        
    }

    /**
        Add new post to database.

        @param $request request
    */
    protected function add(Request $request) 
    {
        $this->validator($request->all())->validate();
            
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'owner_id' => Auth::user()->id,
            'group_id' => Auth::user()->group_id,
            'featured_img' => $this->processImage($request->file('headline')),
            'status' => $request->status
        ]);
        
        return redirect(route('viewArticle'));
    }

    /**
        Shows post edit form.

        @param $request request
        @param $id post's id
    */
    protected function editShowForm($id)     
    {
        $data = Article::findOrFail($id);        
        if (Gate::denies('content-access', $data))
            return response('unauthorized access', 403);

        return view('dashboard.article.add')->with('data', $data);
    }

    /**
        Save post edit changes to database.

        @param $request request
        @param $id post's id
    */
    protected function edit(Request $request, $id) 
    {
        $this->validator($request->all())->validate();

        $article = Article::findOrFail($id);
        if (Gate::denies('content-access', $article))
            return response('unauthorized access', 403);

        $filePath = $this->processImage($request->file('headline'));

        $article->title = $request->title;
        $article->content = $request->content;
        $article->status = $request->status;
        if ($filePath != '')
            $article->featured_img = $filePath;
        $article->save();

        return redirect(route('viewArticle'));
    }

    /**
        Deletes post. Actually it's just set the status to 0.

        @param $request request
        @param $id post's id        
    */
    protected function delete(Request $request, $id) 
    {
        Validator::make($request->all(), [
            'id' => 'required|integer'
        ])->validate();

        if ($request->id != $id) 
            return redirect(route('viewArticle'));

        $post = Article::findOrFail($id);
        if (Gate::denies('content-access', $post))
            return response('unauthorized access', 403);
        $post->status = 0;
        $post->save();

        return redirect(route('viewArticle'));        
    }
}
