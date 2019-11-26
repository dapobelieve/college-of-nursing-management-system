<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Department;

class DepartmentComposer
{
    protected $departments;

    public function __construct(Department $department)
    {
        $this->departments = Department::get();
    }

    public function compose(View $view)
    {
        $view->with('department', $this->departments);
    }
}
