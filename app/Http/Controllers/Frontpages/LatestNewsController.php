<?php

namespace App\Http\Controllers\Frontpages;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LatestNewsController extends Controller
{
    public function index($id, $info){
      $latestNews = Post::find($id);
      //dd($latestNews->images->first());
      return view('latest-news')->with('latestNews', $latestNews)->with('locate', $latestNews->images->first());
    }
}
