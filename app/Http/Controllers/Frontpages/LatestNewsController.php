<?php

namespace App\Http\Controllers\Frontpages;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LatestNewsController extends Controller
{
    public function index($id, $info){
      $latestNews = DB::table('news')->find($id);
      //dd($latestNews);
      return view('latest-news')->with('latestNews', $latestNews);
    }
}
