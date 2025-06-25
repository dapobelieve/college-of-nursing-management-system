<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Payment;
use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Department;

class AccountingController extends Controller
{
  public function __construct()
  {
    $this->middleware('checkAdminPermissions:super,basic');
  }
  public function index()
  {

    return view('admin.accounting.index', ['section' =>'accounting','sub_section' => 'all',
                                          'pay_made' => Payment::orderByDesc('created_at')->paginate(10),
                                          'department' => Department::all()
                                         ]);
  }

  public function indexAdmission()
  {

    return view('admin.accounting.indexadmission', ['section' =>'accounting','sub_section' => 'allAdmission',
                                          'pay_app' => Paymentapplicant::orderByDesc('created_at')->paginate(10),
                                          'department' => Department::all()
                                         ]);
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   //generate finance report for School Fees
  public function exportcsv(Request $request){
    //chech which request is blank
    $data = $request->all();
    $a1 =[];
    $textdata1 = [];
    $i = 0;

    foreach ($data as $key => $value) {
      if ($i > 0) {
        if ($value!= NULL) {
          if ($key=='date_from' or $key=='date_to') {
            $keyvalue = "payments.created_at";
            $operator = ">=";
            if ($key=='date_to') {
              $operator = "<=";
            }
            array_push($a1, $keyvalue);
            array_push($a1, $operator);
            array_push($a1, $value);
            array_push($textdata1, $a1);
            $a1=[];

          }else {
            array_push($a1, $key);
            array_push($a1, $value);
            array_push($textdata1, $a1);
            $a1=[];
          }

        }
      }
      $i++;
    }

    //dd($textdata1);

    $finance =Payment::join('students', 'students.id', '=', 'payments.student_id')
    ->join('users', 'users.id', '=', 'students.user_id')->join('departments', 'students.department_id', '=', 'departments.id')
    ->select('last_name', 'first_name', 'middle_name', 'email', 'phone', 'matric_no', 'departments.name as dept', 'payments.amount', 'payments.reference', 'payments.created_at')
    ->where($textdata1)->orderBy('payments.created_at')->get();

    // file name for download
    $fileName = "FianaceReport".date('Ymd').".xls";

    // headers for download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    $flag = false;
      foreach($finance as $row) {
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


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   //generate finance report for School Fees
  public function exportcsvAdmission(Request $request){
    //chech which request is blank
    $data = $request->all();
    $a1 =[];
    $textdata1 = [];
    $i = 0;

    foreach ($data as $key => $value) {
      if ($i > 0) {
        if ($value!= NULL) {
          if ($key=='date_from' or $key=='date_to') {
            $keyvalue = "paymentapplicants.created_at";
            $operator = ">=";
            $value =$value." 23:59:59";
            if ($key=='date_to') {
              $operator = "<=";
            }
            array_push($a1, $keyvalue);
            array_push($a1, $operator);
            array_push($a1, $value);
            array_push($textdata1, $a1);
            $a1=[];

          }else {
            array_push($a1, $key);
            array_push($a1, $value);
            array_push($textdata1, $a1);
            $a1=[];
          }

        }
      }
      $i++;
    }

    //dd($textdata1);

    $finance =Paymentapplicant::leftJoin('studentapplicants', 'studentapplicants.id', '=', 'paymentapplicants.studentapplicant_id')
    ->leftJoin('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')->leftJoin('departments', 'studentapplicants.department_id', '=', 'departments.id')
    ->select('cardapplicants.reg_no', 'surname', 'first_name', 'middle_name', 'email', 'phone', 'departments.name as appliedfor', 'paymentapplicants.amount', 'paymentapplicants.reference', 'paymentapplicants.created_at')
    ->where($textdata1)->orderBy('paymentapplicants.created_at')->get();

    // file name for download
    $fileName = "AdmissionFianaceReport".date('Ymd').".xls";

    // headers for download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    $flag = false;
      foreach($finance as $row) {
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




}
