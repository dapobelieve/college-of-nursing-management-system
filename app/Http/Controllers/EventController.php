<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    //
    public function index()
    {
      $UpcomingEvent = Event::with('images')->orderBy('expiry_date')->where('expiry_date', '>', Carbon::now())->take(4)->get();
      $CompletedEvent = Event::with('images')->orderByDesc('expiry_date')->where('expiry_date', '<', Carbon::now())->take(4)->get();
     return view('event')->with('UpcomingEvent', $UpcomingEvent)
                        ->with('CompletedEvent', $CompletedEvent);


    }
}
