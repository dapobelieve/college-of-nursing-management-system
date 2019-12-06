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
        // Add the basic system settings
        DB::table('system_settings')->insert([
            ['name' => 'admission_open_date', 'value' => ''],
            ['name' => 'admission_close_date', 'value' => ''],
            ['name' => 'late_payment_fee', 'value' => ''],
            ['name' => 'current_session', 'value' => ''],
            ['name' => 'current_year', 'value' => Carbon::now()->format('Y')],
            ['name' => 'admission_payment_fee', 'value' => ''],
            ['name' => 'acceptance_payment_fee', 'value' => ''],
        ]);
    }
}
