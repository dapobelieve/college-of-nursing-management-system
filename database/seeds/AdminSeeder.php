<?php

use App\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $user = factory(User::class)->make();
        $admin->save();
        $user->save();
        $admin->user()->save($user);
    }
}
