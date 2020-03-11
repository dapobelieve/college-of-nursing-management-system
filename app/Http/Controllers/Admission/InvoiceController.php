<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Department;
use Hash;

class InvoiceController extends Controller
{
  public function index()
  {
    if (session()->has('appAuth')) {
     return redirect()->route('appformfee.activate')->with('error', 'please login');
   }
    return view('admission.Appform');
  }

  public function store(Request $request)
  {
   $this->validate($request, [
        'first_name' => 'string|required',
        'last_name' => 'string|required',
        'email' => 'string|required|unique:invoices',
        'password' => 'required|confirmed|min:6',
        'phone' => 'required|numeric|min:11|unique:invoices',
        'dob' => 'required|before:16 years ago',
        'course' => 'required',
      ]);

      $name = $request->last_name.",".$request->first_name;
        $invoice = Invoice::create([
          'email' => $request->email,
          'metadata' => $name,
          'password' => bcrypt($request->password),
          'phone' => $request->phone,
          'dob' => $request->dob,
        ]);
            $id = $invoice->id;
            $dep = $request->course;
            if ($id < 10) {
                $txt = sprintf("%s000%u",$dep,$id);
            }
            if ($id < 100 and $id > 9) {
              $txt = sprintf("%s00%u",$dep,$id);
            }
            if ($id < 1000 and $id > 99) {
                $txt = sprintf("%s0%u",$dep,$id);
            }
            if ($id > 1000) {
                $txt = sprintf("%s%u",$dep,$id);
            }

        $invoice->update([
          'reg_no' => $txt,
        ]);

        //dd($txt);
        session(['appAuth' => $invoice->id]);

        return redirect()->route('appformfee.activate')->with('success', 'succesful!!!');


    //  return redirect()->back()->with('success', 'Contact the administrator');
  }

  public function indexLogin()
  {
    if (session()->has('appAuth')) {
      return redirect()->route('appformfee.activate')->with('error', 'please login');
   }
    return view('admission.Appformlogin');
  }

  public function storeLogin(Request $request)
  {
   $this->validate($request, [

        'email' => 'string|required',
        'password' => 'required',

      ]);

      $auth = Invoice::where('email', $request->email)->select('id', 'email', 'password')->first();

      if ($auth != null)
       {

          if (Hash::check($request->password, $auth->password)) {
            session(['appAuth' => $auth->id]);
            return redirect()->route('appformfee.activate');
          }
        }


    return redirect()->back()->with('success', 'Contact the administrator');
  }
}
