<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Department;
use App\Models\SystemSetting;
use Hash;

class InvoiceController extends Controller
{
  public function index()
  {
    if (session()->has('appAuth')) {
     return redirect()->route('appformfee.activate')->with('error', 'please login');
   }
   $settings = SystemSetting::where('name', 'admission_close_date')->first();
    return view('admission.Appform',['settings' => $settings]);
  }

  public function store(Request $request)
  {
   $this->validate($request, [
        'first_name' => 'string|required',
        'last_name' => 'string|required',
        'email' => 'string|required|email|unique:invoices|unique:users',
        'password' => 'required|confirmed|min:6',
        'phone' => 'required|numeric|digits:11|unique:invoices|unique:users',
        'dob' => 'required|before:16 years ago'
      ]);

      $name = $request->last_name.",".$request->first_name;
      try {
               $invoice = Invoice::create([
              'email' => $request->email,
              'metadata' => strtoupper($name),
              'password' => bcrypt($request->password),
              'phone' => $request->phone,
              'dob' => $request->dob,
            ]);
      } catch (\Exception $e) {
             $note = 'There is an error in your input.';
             return redirect()->back()->with('warning', $note);
        }

        session(['appAuth' => $invoice->id]);

        return redirect()->route('appformfee.activate')->with('success', 'succesful!!!');


    //  return redirect()->back()->with('success', 'Contact the administrator');
  }

  public function indexLogin()
  {
    if (session()->has('appAuth')) {
      return redirect()->route('appformfee.activate')->with('error', 'please login');
   }
   $settings = SystemSetting::where('name', 'admission_close_date')->first();
    return view('admission.Appformlogin',['settings' => $settings]);
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
