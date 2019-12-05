<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function index()
    {
      return View('admission.upload', ['section' => 'upload']);
    }
}
