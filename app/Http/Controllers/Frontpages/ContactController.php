<?php

namespace App\Http\Controllers\Frontpages;

use App\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\EMessage;
use App\Models\SystemSetting;

class ContactController extends Controller
{
    public function index()
    {
      return view('contact');
    }
    
    public function eMessage()
    {
      return view('contactMessage');
    }

    public function sendMail(Request $request)
    {

      $this->validate($request,[
          'name' => 'required|string',
          'email' => 'required|string|email',
          'subject' => 'required|max:30',
          'message' => 'required|string'
      ]);

      $supportEmail = SystemSetting::where('name','Support_Email')->select('value')->first();
      try {
        Mail::to($supportEmail->value)->send(new EMessage($request));
        session()->flash('status-contact', 'Message sent successfully!');
    } catch (\Exception $e) {
        \Log::error('Contact form error: ' . $e->getMessage());
        session()->flash('status-contact', 'Message could not be sent. Please try again.');
    }

    return redirect()->back();

    }
}
