<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions = [
            [
                'name' => 'Create',
                'slug' => Str::slug('Create'),
            ],

            [
                'name' => 'Show',
                'slug' => Str::slug('Show'),
            ],

            [
                'name' => 'Delete',
                'slug' => Str::slug('delete'),
            ],

            [
                'name' => 'Edit',
                'slug' => Str::slug('Edit'),
            ],

            [
                'name' => 'Update',
                'slug' => Str::slug('Update'),
            ],
        ];
        DB::table('permissions')->insert($permissions);
    }
}
