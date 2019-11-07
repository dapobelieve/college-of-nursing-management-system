<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use DB;
class CheckCard;
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
      $card = DB::table('cards')->where('pin', $request->pin)->first();
      //dd($card);
      if ($card == null) {
        $notification = $this->alertMe('the card is not available!!', 'info');
        return redirect('register')->with($notification);
      }else if($card->status == 'NOT USED'){
        return $next($request);
      }
      else{
        $notification = $this->alertMe('the card has been used!!', 'warning');
        return redirect('register')->with($notification);
      }
    }

    public function alertMe($message, $alertType)
    {
      return array(
                      'message' => $message,
                      'alert-type' => $alertType
                    );
    }



}
