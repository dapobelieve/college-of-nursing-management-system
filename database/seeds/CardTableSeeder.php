<?php

use Illuminate\Database\Seeder;
use App\Card;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Card::create([
          'pin' => '123456789xyz',
          'serial_no' => 'gaghhfdhsvjvdsc',
        ]);
    }
}
