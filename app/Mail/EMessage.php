<?php

Namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SystemSetting;

class EMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function build()
    {
         $domainEmail = SystemSetting::where('name','Domain_Email')->select('value')->first();
       return $this->from($domainEmail->value, 'Oyo State College of Nursing and Midwifery')
                    ->replyTo($this->request->email)
                    ->subject($this->request->subject)
                    ->view('contactMessage')
                    ->with([
                        'name' => $this->request->name,
                        'messageBody' => $this->request->message,
                    ]);
    }
}

