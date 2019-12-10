<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cardapplicant;
use App\Alert;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
      return view('admission.login');
    }

    /*to check if card exists*/

    public function check(Request $request)
    {
      $this->validate($request, [
          'username' => 'string|required',
          'password' => 'string|required'
        ]);

        $login = Cardapplicant::where('reg_no', $request->username)->select('id','password')->first();
        if ($login != null)
         {

            if (Hash::check($request->password, $login->password)) {
              session()->put('auth', $login->id);
              $notification = Alert::alertMe('Login succesful!', 'success');
              return redirect()->route('admission.dashboard')->with($notification);
            }
          }
        return redirect()->route('admission.login')->with('success', 'Wrong information provided!!');
    }
}
