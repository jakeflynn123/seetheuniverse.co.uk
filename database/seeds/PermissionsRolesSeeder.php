<?php

use Illuminate\Database\Seeder;

class PermissionsRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions_roles')->insert([
            ['permissions_id' => 1, 'roles_id' => 1],
            ['permissions_id' => 2, 'roles_id' => 1],
            ['permissions_id' => 3, 'roles_id' => 1],
            ['permissions_id' => 4, 'roles_id' => 1],
            ['permissions_id' => 5, 'roles_id' => 1],
            ['permissions_id' => 6, 'roles_id' => 1],
            ['permissions_id' => 7, 'roles_id' => 1],
            ['permissions_id' => 8, 'roles_id' => 1],
            ['permissions_id' => 9, 'roles_id' => 1],
            ['permissions_id' => 10, 'roles_id' => 1],
            ['permissions_id' => 11, 'roles_id' => 1],
            ['permissions_id' => 12, 'roles_id' => 2],
            ['permissions_id' => 1, 'roles_id' => 2],
            ['permissions_id' => 2, 'roles_id' => 2],
            ['permissions_id' => 8, 'roles_id' => 2],
            ['permissions_id' => 9, 'roles_id' => 2],
        ]);
    }
}
