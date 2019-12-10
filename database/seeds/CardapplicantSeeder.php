<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Cardapplicant;

class CardapplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Cardapplicant::create([
        'reg_no' => 'user-def',
        'password' => Hash::make('akinkunmi')
      ]);

      Cardapplicant::create([
        'reg_no' => 'user-abc',
        'password' => Hash::make('akinkunmi')
      ]);
    }
}
