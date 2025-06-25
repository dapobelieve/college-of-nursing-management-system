<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Cardapplicant;
use App\Models\Invoice;
use App\Models\Location;
use App\Models\State;
use App\Alert;
use PDF;
use DB;
use Paystack;
use Session;
use App\User;
use App\Models\Payment;
use App\Models\Result;
use App\Models\Student;
use App\Models\SystemSetting;
use App\Http\Traits\CloudinaryUpload;
use Carbon\Carbon;

class ApplicantController extends Controller
{
use CloudinaryUpload;

    public function __construct()
    {
      $this->middleware('checkAdminPermissions:super,intermediate');
    }
    public function index()
    {
      $count = Studentapplicant::all()->count();
       $applicants=  Studentapplicant::with(['state', 'cardapplicant'])
    ->select('id', 'surname', 'first_name', 'email', 'phone', 'sponsor_name', 'home_address', 'state_id', 'admission_status', 'sponsor_phone', 'cardapplicant_id')
    ->paginate(10);
      //dd($applicants);
        return view('admin.applicants.index', ['section' =>'applicants','sub_section' => 'all', 'applicant' => $applicants, 'count' => $count]);
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
            try {
                    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                    Studentapplicant::Truncate();
                    Cardapplicant::Truncate();
                    Paymentapplicant::Truncate();
                    Invoice::Truncate();
                    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
               } catch (\Exception $e) {
                 $note = $e->getMessage();
                 $notification = Alert::alertMe($note, 'success');
                 return redirect()->back()->with($notification);
               }

          $notification = Alert::alertMe('Admission DataTable Deleted successfully!!!', 'success');
            return redirect()->route('applicants.index')->with($notification);
      }
    }



    public function exportcsv(Request $request)
    {
          $student =Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
          ->select('reg_no', 'surname', 'first_name', 'middle_name','pin', 'password', 'pic_url', 'gender', 'marital_status',
          'lga', 'state_id','phone', 'sponsor_phone', 'email','date_exam','campus', 'jamb_no', 'score')->orderBy('reg_no')->get();
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


    public function editapplicant(Studentapplicant $studentapplicant)
    {
      return view('admin.applicants.editapplicant', ['section' =>'applicants','sub_section' => 'all', 'student' => $studentapplicant, 'states' => State::all()]);
    }

    public function updateapplicant(Request $request, Studentapplicant $studentapplicant)
    {
      $this->validate($request, [
          'surname' => 'string|required',
          'first_name' => 'string|required',
          'middle_name' => 'string',
          'gender' => 'required',
          'phone' => 'required|digits:11|unique:users',
          'dob' => 'required|date|before:16 years ago',
          'email' => 'required|email|unique:users',
          'home_address' => 'string|required',
          'lga' => 'required',
          'state_of_origin' => 'required',
          'religion' => 'required',
          'sponsor_name' => 'string|required',
          'sponsor_phone' => 'required|digits:11',
          'sponsor_add' => 'required|string',
          'exam_no' => 'required',
          'mathematics' => 'required',
          'english' => 'required',
          'biology' => 'required',
          'physics' => 'required',
          'chemistry' => 'required'
      ], [
          'dob.before' => 'The date of birth should be 16 years upward',
          'state.required' => 'select your present state',
          'state_of_origin.required' => 'Select a State of origin',
          'lga.required' => 'Select a local government'
      ]);

      $studentapplicant->update([
        'surname' => $request->surname,
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'gender' => $request->gender,
        'email' => $request->email,
        'phone' => $request->phone,
        'dob' => $request->dob,
        'home_address' => $request->home_address,
        'lga' => $request->lga,
        'state_id' => $request->state_of_origin,
        'religion' => $request->religion,
          'sponsor_name' => $request->sponsor_name,
          'sponsor_phone' => $request->sponsor_phone,
          'sponsor_add' => $request->sponsor_add,
          'exam_no' => $request->exam_no,
          'mathematics' => $request->mathematics,
          'english' => $request->english,
          'biology' => $request->biology,
          'physics' => $request->physics,
          'chemistry' => $request->chemistry,
          'reg_step' => 'First',
      ]);
        $notification = Alert::alertMe("Student's information updated", 'success');
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
            $email= $request->user;
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $variable = 'studentapplicants.email';
            } else {
              $variable = 'cardapplicants.reg_no';
            }


          $student = Studentapplicant::with('state')
          ->join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
          ->select('studentapplicants.id', 'reg_no', 'admission_status', 'email', 'phone', 'home_address', 'first_name', 'sponsor_phone', 'surname', 'state_id', 'pic_url')
          ->where($variable, $request->user)->first();
          if ($student == null) {
            return $student;
          }
          else {
            if ($student->admission_status == NULL OR $student->admission_status == 'NO') {
              $student->admission_status='NOT YET';
            }
            return $student;
          }
      }


      public function searchunapproved(Request $request)
      {
        // aim is to check for the Invoice table inoder to make payment incase of any webhook delay
        $this->validate($request, [
          'user' => 'required'
          ]);


            $unapproved = Invoice::where('email', $request->user)->first();
            $student = Studentapplicant::where('email', $request->user)->first();

          if ($student == null) {
            return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'unapproved', 'applicant' => $unapproved, 'reg_no' => $unapproved]);
          }
          return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'unapproved', 'applicant' => NULL, 'reg_no' => NULL]);
      }

      function formatNum($id, $dep)
      {
        if ($id < 10) {
            $txt = sprintf("%s000%u",$dep,$id);
        }
        if ($id < 100 and $id > 9) {
          $txt = sprintf("%s00%u",$dep,$id);
        }
        if ($id < 1000 and $id > 99) {
            $txt = sprintf("%s0%u",$dep,$id);
        }
        if ($id >= 1000) {
            $txt = sprintf("%s%u",$dep,$id);
        }
        return $txt;
      }

      public function manualpay(Request $request)
      {
        $this->validate($request, [
          'email' => 'required',
          'reference' => 'required',
          'id' => 'required',
          'amount' => 'required|numeric'
          ]);
          
          $reg_no = SystemSetting::where('name','registration_number')->select('value')->first();

          $invoice = Invoice::find($request->id);
          $student = Studentapplicant::where('email', $request->email)->first();
        //  dd($student);
          if ($student == NULL) {
            //generate a rand pin
                  $pin = (string)rand(1000000000, 9999999999);

            //check if pin has been generated
            $card = Cardapplicant::where('invoice_id', $invoice->id)->first();
            if ($card != NULL) {
              $id = $card->id;
              $dep = $reg_no->value;
              $txt = $this->formatNum($id, $dep);

              $card->update([
                'reg_no' => $txt,
                'password' => bcrypt($pin),
                'pin' => $pin,
              ]);

            }else {
              $card = Cardapplicant::create([
                  'invoice_id' =>  $invoice->id,
                  'password' => bcrypt($pin),
                  'pin' => $pin,
                ]);
                //create registration number
                $id = $card->id;
                $dep = $reg_no->value;
                $txt = $this->formatNum($id, $dep);

                $card->update([
                  'reg_no' => $txt,
                ]);
            }




                  $arr = explode(",", $invoice->metadata);
                  $lastname = $arr[0];
                  $firstname = $arr[1];


                  $student = $card->studentapplicant()->create([
                     'first_name' => $firstname,
                     'surname' => $lastname,
                     'phone' =>  $invoice->phone,
                     'email' => $invoice->email,
                     'dob' => $invoice->dob
                  ]);

                    $payment = $student->Paymentapplicant()->create([
                      'reference' => $request->reference,
                      'payment_modes_id' => 1, // to show it is paid through paystack
                      'status' => 'PAID',
                      'amount' => $request->amount - 300, //getting exact amount from paystack
                    ]);

            $notification = Alert::alertMe('Payment Made!!!', 'success');
              return redirect()->back()->with($notification);
          }else {

            $notification = Alert::alertMe('Student Already Exist!!!', 'success');
              return redirect()->back()->with($notification);
          }




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
      public function pdfApplicants($page)
      { ini_set('memory_limit', '2048M');
        $page = $page * 359;
        $applicants= Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')->where('cardapplicants.is_closed', '0')->orderBy('date_exam')->skip($page)->take(359)->get();
        
        $pdf = PDF::loadView('admin/applicants/downloadpdf', compact('applicants'));
        //dd($applicants[0]);
        return $pdf->download('ExaminationList.pdf');
      }

      // show page to add result
      public function showresultpage()
      {
        return view('admin.applicants.addresult', ['section' =>'applicants','sub_section' => 'add']);
      }


      public function importresult(Request $request)
      {
          ini_set('memory_limit', '2048M');
          ini_set('max_execution_time', '600');
      $this->validate($request,[
              'file_csv'          => 'required',
              'csv_option' => 'required'
          ]
        );
        
        
        
         if ($request->csv_option == "ad_score") {
            $colquery = 'score';
          }else if ($request->csv_option == "ad_status"){
            $colquery = 'admission_status';
          }else {
            $colquery = 'date_interview';
          }

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
                $col = filter_var($filesop[1], FILTER_SANITIZE_STRING);

                // get the id of the card
                $result = Cardapplicant::where('reg_no', $reg_no)->first();
                //$result = Studentapplicant::where('jamb_no', $reg_no)->first();
                if ($result == null) {
                    $msg.= $reg_no." does not exist in the database at row ".$i."\n";
                }
                else{
                    if($colquery == 'date_interview'){
                        $col= date_create($col);
                    }
                  Studentapplicant::where('cardapplicant_id', $result->id)
                  ->update([$colquery => $col]);
                  /* Studentapplicant::where('id', $result->id)
                  ->update([$colquery => $col]);
                  
                  
                 $student = studentapplicant::find($result->id);
                    
                           $user = User::create([
                             'first_name' => $student->first_name,
                             'middle_name' => $student->middle_name,
                             'last_name' => $student->surname,
                             'sex' => $student->gender,
                             'phone' => $student->phone,
                             'dob' => $student->dob,
                             'state_id' => $student->state_of_origin,
                             'location_id' => $student->lga,
                             'email' => $student->email,
                             'password' => bcrypt($student->phone),
                             'address' =>  $student->home_address,
                             'city' => $student->state,
                           ]);
                    
                    
                           $rol = 3; // 3 is id for role as a student
                             $user->roles()->sync([(int) $rol]);
                             $matric_no="NOT/YET/ISSUED";
                    
                           $students = $user->student()->create([
                             'department_id' => $student->department_id,
                             'matric_no' => $matric_no,
                             'level' => 100,
                             'marital_status' => $student->marital_status,
                             'admission_no' => $student->cardapplicant->reg_no,
                             'sponsors_name' => $student->sponsor_name,
                             'sponsors_phone' => $student->sponsor_phone,
                           ]);
                    
                           $result = $students->result()->create([
                             'exam_type' => $student->exam_type,
                             'exam_no' => $student->exam_no,
                             'mathematics' =>  $student->mathematics,
                             'english' =>  $student->english,
                             'chemistry' =>  $student->chemistry,
                             'biology' =>  $student->biology,
                             'physics' =>  $student->physics,
                           ]);
                    
                    
                           $imageData = $this->upload($student->pic_url, 'students', 400, '', 'auto');
                           $user->images()->create([
                               'url' => $imageData['secure_url']
                           ]);*/
                  

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
