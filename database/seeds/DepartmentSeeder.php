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
          ]);

    }
}
