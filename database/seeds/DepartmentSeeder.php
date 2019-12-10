<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          Department::create([
            'name' => 'Nursing',
            'hod' => 'Mrs Adebowale',
            'description' => 'We are sorry about but we are just following
            the NG registry standard but anyways, we have submitted your
            document to the registry.
            You will get an update from us when they respond.Regards.'
          ]);

          Department::create([
            'name' => 'Midwifery',
            'hod' => 'Mrs Ejalonibu',
            'description' => 'We are sorry about but we are just following
            the NG registry document to the registry. standard but anyways, we have submitted your
            You will get an update from us when they respond.Regards.'
          ]);

    }
}
