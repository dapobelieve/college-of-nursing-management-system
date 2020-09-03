<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Cardapplicant;
use App\Alert;
use PDF;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants= Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
        ->join('paymentapplicants', 'paymentapplicants.studentapplicant_id', '=', 'studentapplicants.id')->paginate(10);
        //dd($applicants[0]->cardapplicant);
        return view('admin.applicants.index', ['section' =>'applicants','sub_section' => 'all', 'applicant' => $applicants]);
    }

    public function deleteall(Request $request)
    {
      $this->validate($request, [
        'password' => 'required',
        ]);
        if ($request->password != 'oysconme1949new') {
          $notification = Alert::alertMe('Sorry! you are not allowed any permission on this file', 'info');
          return redirect()->route('applicants.index')->with($notification);
        }else {
          Studentapplicant::Truncate();
          $notification = Alert::alertMe('DataTable Deleted successfully!!!', 'success');
            return redirect()->route('applicants.index')->with($notification);
      }
    }



    public function exportcsv(Request $request)
    {

          $student =Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
          ->join('paymentapplicants', 'paymentapplicants.studentapplicant_id', '=', 'studentapplicants.id')
          ->select('reg_no','surname', 'first_name', 'middle_name', 'password', 'pic_url', 'gender', 'marital_status',
          'lga', 'state_of_origin', 'home_address','phone')->get();
          // file name for download
          $fileName = "applicants".date('Ymd').".xls";

          // headers for download
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$fileName\"");

          $flag = false;
            foreach($student as $row) {
                if(!$flag){
                    // display column names as first row
                    echo implode("\t", array_keys($row->getOriginal())) . "\n";
                    $flag = true;
                }
                echo implode("\t", array_values($row->getOriginal())) . "\n";
            }
            exit;
            $notification = Alert::alertMe('Exporting!!!', 'Success');
            return redirect()->route('applicants.index')->with($notification);


    }

    public function edit(Studentapplicant $studentapplicant)
    {
      return view('admin.applicants.addscore', ['section' =>'applicants','sub_section' => 'all', 'studentapplicant' => $studentapplicant]);
    }

      public function update(Request $request, Studentapplicant $studentapplicant)
      {
        $this->validate($request, [
          'ad_sta' => 'required',
          'score' => 'required',
          ]);

          $studentapplicant->update([
            'score' => $request->score,
            'admission_status' => $request->ad_sta
          ]);
          $notification = Alert::alertMe('Result Added!!', 'success');
          return redirect()->route('applicants.index')->with($notification);
      }


      public function search(Request $request)
      {
        $this->validate($request, [
          'user' => 'required'
          ]);

          //$student = Cardapplicant::with('studentapplicant')->where('reg_no', $request->user)->first();
          $student = Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
          ->join('paymentapplicants', 'paymentapplicants.studentapplicant_id', '=', 'studentapplicants.id')
          ->where('cardapplicants.reg_no', $request->user)->first();
          //dd($student);
          if ($student == null) {
            return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'approved', 'applicant' => $student, 'reg_no' => $student]);
          }
          return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'approved', 'applicant' => $student, 'reg_no' => $student->reg_no]);
      }


      public function searchunapproved(Request $request)
      {
        $this->validate($request, [
          'user' => 'required'
          ]);

          //$student = Cardapplicant::with('studentapplicant')->where('reg_no', $request->user)->first();
          $student = Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
          ->whereDoesntHave('paymentapplicant')->where('cardapplicants.reg_no', $request->user)->first();

          //just get student the id gotten from the query above is for cardapplicants
          $studentID = Studentapplicant::where('cardapplicant_id', $student->id)->first();

          if ($student == null) {
            return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'unapproved', 'applicant' => $student, 'reg_no' => $student]);
          }
          return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'unapproved', 'applicant' => $student, 'reg_no' => $student->reg_no, 'studentID' => $studentID]);
      }


      public function delete(Studentapplicant $studentapplicant)
      {
        $studentapplicant->delete();
        $notification = Alert::alertMe('Deleted successfully!!!', 'success');
          return redirect()->route('applicants.index')->with($notification);

      }


      public function tellerindex(Studentapplicant $studentapplicant)
      {
        return view('admin.applicants.confirmteller', ['section' =>'applicants','sub_section' => 'all', 'studentapplicant' => $studentapplicant]);
      }


      public function addteller(Request $request, Studentapplicant $studentapplicant)
      {
        $this->validate($request, [
          'reference' => 'required',
          'amount' => 'required'
          ]);
          $mode = 2;
          $studentapplicant->paymentapplicant()->create([
            'reference' => $request->reference,
            'amount' => $request->amount,
            'status' => 'PAID',
            'payment_modes_id' => $mode
          ]);
          $notification = Alert::alertMe('Applicant Payment confirmed', 'success');
          return redirect()->back()->with($notification);
      }

// create ExaminationList in PDF format
      public function pdfApplicants()
      {
        $applicants= Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
        ->where('department_id', '!=', '2')->orderBy('cardapplicants.reg_no')->skip(1077)->take(359)->get();
        //dd($applicants[0]);
        $pdf = PDF::loadView('admin/applicants/downloadpdf', compact('applicants'));

        return $pdf->download('ExaminationList.pdf');
      }

      // show page to add result
      public function showresultpage()
      {
        return view('admin.applicants.addresult', ['section' =>'applicants','sub_section' => 'add']);
      }


      public function importresult(Request $request)
      {
        $this->validate($request,[
                'file_csv'          => 'required',
            ]
          );

          $msg = "";
          $i = 0;
          $sql = true;
          $file = $request->file('file_csv')->getRealPath();
          $handle = fopen($file, "r");
          $filename = $request->file_csv->getClientOriginalExtension();
          if ($file == NULL || $filename !== 'csv') {
            $notification = Alert::alertMe('Please select a CSV file to import', 'warning');
              return redirect()->route('applicants.addresult')->with($notification);
          }else {
            while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
              {
                $reg_no=  filter_var($filesop[0], FILTER_SANITIZE_STRING);
                $score =  filter_var($filesop[1], FILTER_SANITIZE_STRING);
                $status = filter_var($filesop[2], FILTER_SANITIZE_STRING);

                // get the id of the card
                $result = Cardapplicant::where('reg_no', $reg_no)->first();
                if ($result == null) {
                    $msg.= $reg_no." does not exist in the database at row ".$i."\n";
                }
                else{
                  Studentapplicant::where('cardapplicant_id', $result->id)
                  ->update(['score' => $score, 'admission_status' => $status]);

                $sql = true;
                }
                $i++;
              }

            if ($sql) {
              if($msg != ""){
                $message = "imported successfully!!! but '.$msg.'";
              return redirect()->route('applicants.addresult')->with('success', $message);
              }
              $notification = Alert::alertMe('Imported successfully!!!', 'success');
                return redirect()->route('applicants.addresult')->with($notification);

            } else {
              $notification = Alert::alertMe('Sorry! There is some problem in the import file', 'warning');
              return redirect()->route('applicants.addresult')->with($notification);

            }
            }

      }

}
