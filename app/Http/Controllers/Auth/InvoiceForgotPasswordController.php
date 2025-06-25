<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class InvoiceForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:invoice');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email-invoice');
    }

    protected function broker()
    {
        return Password::broker('invoices');
    }
}

