<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user_role = Role::where('slug','user')->first();
        $admin_role = Role::where('slug', 'admin')->first();

        $user_perm = Permission::whereIn('slug',['create','show'])->get();
        $admin_perm = Permission::whereIn('slug',['edit','delete','show','update'])->get();

        $user = new User();
        $user->name = 'Test User';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('1234567');
        $user->save();
        $user->roles()->attach($user_role);
        $user->permissions()->attach($user_perm);

        $admin = new User();
        $admin->name = 'Test Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin1234');
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);
    }
}
