<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cardapplicant;

class ActivateController extends Controller
{
  public function index()
  {
    return view('admission.XYZABC1949');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
        'passage' => 'string|required',
        'reg_no' => 'string|required|unique:cardapplicants',
        'password' => 'string|required'
      ]);

      if ($request->passage == 'redrooftop1949') {
        Cardapplicant::create([
          'reg_no' => $request->reg_no,
          'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('success', 'succesful!!!');
      }

      return redirect()->back()->with('success', 'Contact the administrator');
  }
}
