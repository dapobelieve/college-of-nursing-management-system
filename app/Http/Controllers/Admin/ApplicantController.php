<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Alert;;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants= Studentapplicant::paginate(10);
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

          $student =Studentapplicant::select('card_id','surname', 'first_name', 'gender', 'marital_status',
          'state_of_origin', 'home_address','phone')->get();
          // file name for download
          $fileName = "cardapplicants".date('Ymd').".xls";

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

}
