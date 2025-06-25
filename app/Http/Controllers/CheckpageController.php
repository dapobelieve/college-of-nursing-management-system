<?php

namespace App\Http\Controllers;
use DB;
use App\Alert;
use App\Models\Student;
use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CheckpageController extends Controller
{
  public function index()
  {
        return view('portal.checkpage', ['section' => '']);
  }

  public function store(Request $request)
  {
      $card = new Card;
      $card = $card->where('serial_no', $request->serial_no)->first();
      if ($card == null) {
        $notification = Alert::alertMe('the card is not available!!', 'info');
        return redirect('portal/checkpage')->with($notification);
      }else if($card->status == 'NOT USED'){
        if (Hash::check($request->pin, $card->pin)) {
          DB::table('cards')->where('serial_no', $request->serial_no)->update(['status' => 'USED', 'student_id'=> session()->get('st_id')]);
          $notification = Alert::alertMe('Successful!!', 'success');
        return redirect('portal/dashboard')->with($notification);
      }else {
        $notification = Alert::alertMe('Incorrect pin!', 'warning');
      return redirect('portal/checkpage')->with($notification);
      }
      }
      else{
        $notification = Alert::alertMe('the card has been used!!', 'warning');
        return redirect('portal/checkpage')->with($notification);
      }
  }

}
