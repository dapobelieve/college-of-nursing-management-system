<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Location;
use Illuminate\Http\Request;

class StateController extends Controller
{

  public function getLocations(State $state)
  {
      $lgs = $state->location()->get();
      return response()->json($lgs);
  }


  public function recieve($id)
  {
     $lga = State::find($id)->location->all();
    $result= json_encode($lga);
    $arraydata = json_decode($result);
    return $arraydata;

  }
}
