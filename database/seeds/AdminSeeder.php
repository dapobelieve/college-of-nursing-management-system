<?php

use App\User;
use App\Models\Role;
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
        $role = Role::where('name', 'Admin')->first();
        
        $admin->save();
        $user->save();

        $user->roles()->attach($role);
        $admin->user()->save($user);
    }
}
