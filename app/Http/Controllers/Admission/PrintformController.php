<?php

namespace App\Http\Controllers\Admission;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Cardapplicant;
use App\Alert;
use PDF;


class PrintformController extends Controller
{

  public function index()
  {
    if (!Session::has('studapp_id')) {
      $student = Studentapplicant::where('cardapplicant_id', session()->get('auth'))->first();
      if ($student == null) {
        $notification = Alert::alertMe('Complete step one and two', 'info');
        return redirect()->route('application.index')->with($notification);
      }
      session()->put('studapp_id', $student->id);
    }

    $student = Cardapplicant::find(session()->get('auth'))->studentapplicant;
    //redirect to application stepone
    if ($student == null) {
      $notification = Alert::alertMe('Complete step one and two', 'info');
      return redirect()->route('application.index')->with($notification);
    }

    if ($student->reg_step != 'Completed') {
      $notification = Alert::alertMe('Upload your passport', 'info');
      return redirect()->route('upload.index')->with($notification);
    }

    return view('admission.printout', ['section' => 'printout', 'student' => $student]);
  }


  public function downloadPDF()
  {
    if (Session::has('studapp_id')) {

    $student = Cardapplicant::find(session()->get('auth'))->studentapplicant;

    $payment = $student->paymentapplicant;

    $dob = date('d-m-Y', strtotime($student->dob));

    $pdf = PDF::loadView('admission/pdfRegistration', compact('student', 'dob', 'payment'));

    return $pdf->download('invoice.pdf');

  }

  }

  public function receiptPDF()
  {
      if (Session::has('studapp_id')) {

    $student = Cardapplicant::find(session()->get('auth'))->studentapplicant;

    $payment = $student->paymentapplicant;

    $dob = date('d-m-Y', strtotime($student->dob));

    $pdf = PDF::loadView('admission/PDFreceipt', compact('student', 'dob', 'payment'));

    return $pdf->download('invoice.pdf');

  }

}

}
