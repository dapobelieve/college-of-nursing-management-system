<?php

namespace App\Http\Controllers\Frontpages;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Post;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
      $UpcomingEvent = Event::with('images')->orderBy('expiry_date')->where('expiry_date', '>', Carbon::now())->first();
      $latestNews = Post::with('images')->orderBy('updated_at', 'DESC')->take(6)->get();

      $news = $latestNews->first();
    //  dd($latestNews[3]->images);
    //  dd($UpcomingEvent->images[0]->url);
      return view('pages.home')->with('UpcomingEvent', $UpcomingEvent)
                              ->with('latestNews', $latestNews)
                              ->with('student', Student::all()->count())
                              ->with('course', Department::all()->count())
                              ->with('lecturer', Lecturer::all()->count())
                              ->with('news', $news);

    }
}
