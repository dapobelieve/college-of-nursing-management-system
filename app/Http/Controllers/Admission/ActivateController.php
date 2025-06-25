<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cardapplicant;
use App\Models\Invoice;
use App\Models\SystemSetting;
use Paystack;
use PDF;

class ActivateController extends Controller
{
  public function index()
  {
    $authId = session('appAuth');
    $invoice = $authId ? Invoice::find($authId) : null;
    
    if (!$authId || !$invoice) {
        return redirect()
            ->route('invoice.activate')
            ->with('error', 'Please log in to continue.');
    }

    $card = $invoice->cardapplicant;
    $admissionCloseSetting = SystemSetting::where('name', 'admission_close_date')->first();
    //dd($card);
    //$paymentFee = null;
    //$subAccount = null;

    //if (is_null($card)) {
        $systemSettings = SystemSetting::whereIn('name', [
            'admission_payment_fee',
            'admission_sub_account'
        ])->get()->keyBy('name');

        $paymentFee = $systemSettings['admission_payment_fee']->value ?? null;
        $subAccount = $systemSettings['admission_sub_account']->value ?? null;
    //}

    // return with consolidated data
    return view('admission.Appformfee', [
        'user' => $invoice,
        'payment' => $paymentFee,
        'subaccount' => $subAccount,
        'settings' => $admissionCloseSetting,
        'card' => $card,
        'rounds' => $card->count()
    ]);

  }

  public function redirectToGateway(Request $request)
  {
    $request->validate([
        'amount' => 'required|string|max:255',
    ]);

    try {
      return Paystack::getAuthorizationUrl()->redirectNow();
    } catch (\Exception $e) {
      $note = $e->getMessage();
      return redirect()->back()->with('warning', $note);
    }
  }

  public function downloadPDF(Cardapplicant $cardapplicant)
  {

    $pdf = PDF::loadView('admission/pdfAppformfee', compact('cardapplicant'));

    return $pdf->download('Registration.pdf');
  }

  public function logout()
  {
    session()->forget('appAuth');
    return redirect()->route('invoice.activate');

  }
}
