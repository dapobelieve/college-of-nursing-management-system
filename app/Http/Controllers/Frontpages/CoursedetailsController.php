<?php

namespace App\Http\Controllers\Frontpages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class CoursedetailsController extends Controller
{
    public function index($id)
    {
      $department = Department::find($id);

      return View('coursedetails')->with('dept', $department);
    }
}
