<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user_permission = Permission::whereIn('slug',['create','show'])->get();
        $admin_permission = Permission::whereIn('slug', ['edit','delete','create','delete'])->get();

        $user_role = new Role();
        $user_role->slug = 'user';
        $user_role->name = 'user';
        $user_role->save();
        $user_role->permissions()->attach($user_permission);

        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'admin';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);

    }
}
