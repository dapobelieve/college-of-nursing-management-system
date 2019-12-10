<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d');
        // Add the basic system settings
        DB::table('system_settings')->insert([
            ['name' => 'admission_open_date', 'value' => $now],
            ['name' => 'admission_close_date', 'value' => $now],
            ['name' => 'late_payment_fee', 'value' => '2000.00'],
            ['name' => 'current_session', 'value' => '2019/2020'],
            ['name' => 'admission_payment_fee', 'value' => '50000.00'],
            ['name' => 'acceptance_payment_fee', 'value' => '10000.00'],
        ]);
    }
}
