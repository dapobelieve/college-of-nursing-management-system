<?php

namespace App\Http\Middleware;

use Session;
use App\Alert;
use Closure;
use App\Models\Student;
use DB;
use Auth;
use App\User;
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
      /*//check whether it is a Student
      if (Auth::check()) {
        $userrole = User::find(Auth::id())->roles->first();
        dd($userrole);
        if ($userrole->name == "Admin") {
          return redirect()->route('dashboard.home');
        }
      }*/
      //check whether student session id has been set
      if(!session()->has('st_id'))
          {
          $student = Student::where('user_id', Auth::id())->select('id')->first();
          session()->put('st_id', $student->id);
          }
          //check card to know if student has registered with a scratch card
      $card = DB::table('cards')->where('student_id', session()->get('st_id'))->first();
        if ($card == null)
            {
              $notification = Alert::alertMe('you need to get a scratch card to access your portal!!!', 'info');
              return redirect()->route('portal.checkpage')->with($notification);
            }
            return $next($request);
    }

}
