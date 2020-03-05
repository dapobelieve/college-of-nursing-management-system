<?php

namespace App\Http\Controllers\Frontpages;

use App\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
      return view('contact');
    }

    public function sendMail(Request $request)
    {

      $this->validate($request,[
          'name' => 'required|string',
          'email' => 'required|string|email',
          'subject' => 'required|max:30',
          'message' => 'required|string'
      ]);

      $toEmail = 'info@oysconme.edu.ng';
     $subject = $request->subject;

     $headers = array("From: admin@oysconme.edu.ng",
   "Reply-To: $request->email",
   "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);
     $content = $request->message;
     $send = mail($toEmail, $subject, $content, $headers);
     if($send) {
        session()->flash('status-contact', 'Message sent successfully!');
        return redirect()->back();
    	}
      else {
        session()->flash('status-contact', 'Message not sent!');
        return redirect()->back();
      }

    }
}
