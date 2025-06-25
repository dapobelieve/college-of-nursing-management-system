<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class InvoiceResetPasswordController extends Controller
{
    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest:invoice');
    }

    protected function broker()
    {
        return Password::broker('invoices');
    }

    protected function guard()
    {
        return Auth::guard('invoice');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset-invoice')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }
}
