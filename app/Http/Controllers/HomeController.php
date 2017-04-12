<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\User;
use App\Article;
use App\Competition;
use Illuminate\Http\Request;

class HomeController extends Controller
{    
    public function index()
    {
        return view('welcome');
    }

    public function showDept($dept)
    { 
      if ($dept == 'senbud') {
        return view('temp.senbud', [
          'name' => 'senbud',
          'articles' => Article::where('group_id', 2)
            ->where('status', 1)
            ->limit(5)
            ->get(),
          'competitions' => Competition::where('group_id', 2)
            ->where('status', 1)
            ->limit(5)
            ->get()
          ]);
      } else if ($dept == 'pnk') {
        return view('temp.pnk', [
          'name' => 'pnk',
          'articles' => Article::where('group_id', 3)
            ->where('status', 1)
            ->limit(5)
            ->get(),
          'competitions' => Competition::where('group_id', 3)
            ->where('status', 1)
            ->limit(5)
            ->get()
          ]);
      } else if ($dept == 'depor') {
        return view('temp.depor', [
          'name' => 'depor',
          'articles' => Article::where('group_id', 4)
            ->where('status', 1)
            ->limit(5)
            ->get(),
          'competitions' => Competition::where('group_id', 4)
            ->where('status', 1)
            ->limit(5)
            ->get()
          ]);
      }
    }
    public function viewCompetition() {            
      return view('competition')->with('data', Competition::all());
    }

    public function showArticle($dept, $id) {
      $article = Article::findOrFail($id);      
      if ($article->status != 1) 
      {
        return response('article not found.', 404);
      }
      $date = new DateTime($article->created_at, new DateTimeZone('UTC'));
      $date->setTimeZone(new DateTimeZone('Asia/Jakarta'));
      $formatted = $date->format('F j, o \a\t g:i a');      

      return view('temp.blog', [
        'name' => $dept, 
        'article' => $article,
        'date' => $formatted,
        'author' => User::findOrFail($article->owner_id)->name,
        'type' => 'article'
        ]);
    }

    public function showCompetition($dept, $id) {
      $competition = Competition::findOrFail($id);      
      if ($competition->status != 1) 
      {
        return response('article not found.', 404);
      }
      $date = new DateTime($competition->created_at, new DateTimeZone('UTC'));
      $date->setTimeZone(new DateTimeZone('Asia/Jakarta'));
      $formatted = $date->format('F j, o \a\t g:i a');      

      return view('temp.blog', [
        'name' => $dept, 
        'article' => $competition,
        'date' => $formatted,
        'author' => User::findOrFail($competition->owner_id)->name,
        'type' => 'competition'
        ]);
    }
}
