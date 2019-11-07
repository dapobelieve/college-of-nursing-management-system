<?php

namespace App\Http\Controllers\Frontpages;

use Carbon\Carbon;
use DB;
use App\Models\Event;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
      $UpcomingEvent = Event::all()-> sortBy('expiry_date')->where('expiry_date', '>', Carbon::now())->first();
      $latestNews = DB::table('news')->orderBy('created_at', 'DESC')->select('id','title','details')->take(6)->get();
      //dd($UpcomingEvent);
      return view('welcome')->with('department', Department::all()->pluck('name'))
                              ->with('UpcomingEvent', $UpcomingEvent)
                              ->with('latestNews', $latestNews);

    }
}
