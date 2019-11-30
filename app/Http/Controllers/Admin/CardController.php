<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Card;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cards = Card::select('serial_no', 'matric_no', 'status')
               ->join('students', 'students.id', '=', 'cards.student_id')
               ->paginate(10);
        return view('admin.cards.index', ['section' =>'cards', 'cards' => $cards]);
    }

    public function index2()
    {
      $cards = Card::where('student_id', null)->paginate(10);
      return view('admin.cards.index2', ['section' =>'cards', 'cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cards.create');
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
            return redirect()->route('cards.create')->with('success', 'Please select a CSV file to import');
        }else {
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
              $pin=  filter_var($filesop[0], FILTER_SANITIZE_STRING);
              $serial_no =  filter_var($filesop[1], FILTER_SANITIZE_STRING);

              // check to know if the pin already exist in the database
              $result = Card::where('pin', $pin)->first();
              if ($result != null) {
                  $msg.= $serial_no." already exists in the database at row ".$i."\n";
              }
              else{
              Card::create(['pin' => bcrypt($pin),
              'serial_no' => $serial_no]);
              $sql = true;
              }
              $i++;
            }

          if ($sql) {
            if($msg != ""){
              $message = "imported successfully!!! but '.$msg.'";
            return redirect()->route('cards.index')->with('success', $message);
            }
              return redirect()->route('cards.index')->with('success', 'Imported successfully!!!');

          } else {
            return redirect()->route('cards.create')->with('success', 'Sorry! There is some problem in the import file.');

          }
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
        return view('admin.cards.edit')->with('card', $card);
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
    public function destroy(Card $card)
    {
      $card->delete();
      return redirect()->route('cards.index2')->with('success', 'Card deleted');
    }
}
