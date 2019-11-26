<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentMode;

class Payment_modesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PaymentMode::create([
        'name' => 'Paystack',
      ]);
    }
}
