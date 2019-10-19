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
      $UpcomingEvent = Event::all()-> sortBy('expiry_date')->where('expiry_date', '>', Carbon::now())->take(4);
      $CompletedEvent = Event::all()-> sortByDesc('expiry_date')->where('expiry_date', '<', Carbon::now())->take(4);

     return view('event')->with('UpcomingEvent', $UpcomingEvent)
                        ->with('CompletedEvent', $CompletedEvent);


    }
}
