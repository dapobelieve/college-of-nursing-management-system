<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use DB;
class CheckCard
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
      if ($card == null) {
        Session::flash('status','the card not recognized!!');
        return redirect('register');
      }else if($card->check_used == 'not used'){
        return $next($request);
      }
      else{
        Session::flash('status','the card has been used');
        return redirect('register');
      }
    }

}
