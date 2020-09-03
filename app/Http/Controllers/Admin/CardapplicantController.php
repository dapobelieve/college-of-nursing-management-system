<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cardapplicant;
use App\Models\Studentapplicant;
use App\Card;
use App\Alert;

class CardapplicantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cards = Studentapplicant::with('cardapplicant')->paginate(10);
      return view('admin.cardapplicants.index', ['section' =>'cardapplicants','sub_section' => 'all', 'cards' => $cards]);
  }

  public function index2()
  {
    $cards =Cardapplicant::whereDoesntHave('studentapplicant')->paginate(10);
    return view('admin.cardapplicants.index3', ['section' =>'cardapplicants','sub_section' => 'all2', 'cards' => $cards]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('admin.cardapplicants.create',['section' =>'cardapplicants','sub_section' => 'create']);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
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
          return redirect()->route('cardapplicants.create')->with($notification);
      }else {
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
          {
            $reg_no=  filter_var($filesop[0], FILTER_SANITIZE_STRING);
            $password =  filter_var($filesop[1], FILTER_SANITIZE_STRING);

            // check to know if the pin already exist in the database
            $result = Cardapplicant::where('reg_no', $reg_no)->first();
            if ($result != null) {
                $msg.= $reg_no." already exists in the database at row ".$i."\n";
            }
            else{
            Cardapplicant::create(['reg_no' => $reg_no,
            'password' => bcrypt($password)]);
            $sql = true;
            }
            $i++;
          }

        if ($sql) {
          if($msg != ""){
            $message = "imported successfully!!! but '.$msg.'";
          return redirect()->route('cardapplicants.index')->with('success', $message);
          }
          $notification = Alert::alertMe('Imported successfully!!!', 'success');
            return redirect()->route('cardapplicants.index')->with($notification);

        } else {
          $notification = Alert::alertMe('Sorry! There is some problem in the import file', 'warning');
          return redirect()->route('cardapplicants.create')->with($notification);

        }
        }

  }



  public function exportcsv(Request $request)
  {
    $this->validate($request, [
      'password' => 'required',
      ]);
      if ($request->password != 'oysconme1949new') {
        $notification = Alert::alertMe('Sorry! you are not allowed to download this file', 'info');
        return redirect()->route('cardapplicants.index3')->with($notification);
      }else {
        $cardss = Cardapplicant::whereDoesntHave('studentapplicant')->select('reg_no')->get();
        // file name for download
        $fileName = "cardapplicants".date('Ymd').".xls";

        // headers for download
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        $flag = false;
          foreach($cardss as $row) {
              if(!$flag){
                  // display column names as first row
                  echo implode("\t", array_keys($row->getOriginal())) . "\n";
                  $flag = true;
              }
              echo implode("\t", array_values($row->getOriginal())) . "\n";
          }
          exit;
          $notification = Alert::alertMe('Exporting!!!', 'Success');
          return redirect()->route('cardapplicants.index3')->with($notification);

      }
  }

  /**
   * Remove the specific resources from storage.
   *by taking out used cards from database
   *
   */
  public function deleteall(Request $request)
  {
    $this->validate($request, [
      'password' => 'required',
      ]);
      if ($request->password != 'oysconme1949new') {
        $notification = Alert::alertMe('Sorry! you are not allowed to download this file', 'info');
        return redirect()->route('cardapplicants.index3')->with($notification);
      }else {
        $cards =Cardapplicant::join('studentapplicants', 'studentapplicants.card_id', '=', 'cardapplicants.card_id')
        ->delete();
        //dd($cards);
        $notification = Alert::alertMe('Cards deleted!!!', 'success');
        return redirect()->route('cardapplicants.index')->with($notification);
      }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Card $card)
  {
      //return view('admin.cards.edit')->with('card', $card);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Cardapplicant $cardapplicant)
  {
  /*  $card->delete();
    $notification = Alert::alertMe('Card deleted!!!', 'success');
    return redirect()->route('cards.index2')->with($notification);*/
  }
}
