<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RoleTableSeeder::class);
      $this->call(StatesTableSeeder::class);
      $this->call(LocationsSeeder::class);
      $this->call(SettingsSeeder::class);
      //$this->call(CardapplicantSeeder::class);
      //$this->call(CardTableSeeder::class);
      $this->call(DepartmentSeeder::class);
      $this->call(Payment_modesSeeder::class);
      // $this->call(UsersTableSeeder::class);
    }
}
