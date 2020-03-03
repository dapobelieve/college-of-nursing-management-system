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
        $admin->permission_level = 'super';
        $user = factory(User::class)->make();
        $role = Role::where('name', 'Admin')->first();

        $user->save();

        $user->roles()->attach($role);
        $user->admin()->save($admin);
    }
}
