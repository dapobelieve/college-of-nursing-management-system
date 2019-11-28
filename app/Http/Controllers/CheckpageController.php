<?php

namespace App\Http\Controllers;
use DB;
use App\Alert;
use App\Models\Student;
use App\Card;
use Illuminate\Http\Request;

class CheckpageController extends Controller
{
  public function index()
  {
    $card = Card::where('student_id', session()->get('st_id'))->first();
      if (!$card == null) {
        return redirect()->route('portal.dashboard');
      }
      return view('portal.checkpage');
  }

  public function store(Request $request)
  {
      $card = new Card;
      $card = $card->where('pin', $request->pin)->first();
      if ($card == null) {
        $notification = Alert::alertMe('the card is not available!!', 'info');
        return redirect('portal/checkpage')->with($notification);
      }else if($card->status == 'NOT USED'){
          DB::table('cards')->where('pin', $request->pin)->update(['status' => 'USED', 'student_id'=> session()->get('st_id')]);
          $notification = Alert::alertMe('Successful!!', 'success');
        return redirect('portal/dashboard')->with($notification);
      }
      else{
        $notification = Alert::alertMe('the card has been used!!', 'warning');
        return redirect('portal/checkpage')->with($notification);
      }
  }

}
