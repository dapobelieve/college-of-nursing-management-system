<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Location;
use Illuminate\Http\Request;

class StateController extends Controller
{

  public function recieve($id)
  {
     $lga = State::find($id)->location->all();
    $result= json_encode($lga);
    $arraydata = json_decode($result);
    return $arraydata;

  }
}
