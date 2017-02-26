<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Admin', 'detail' => 'High Control'],
            ['id' => 2, 'name' => 'Creator', 'detail' => 'Medium Control'],
            ['id' => 3, 'name' => 'Viewer', 'detail' => 'No Control'],
        ]);
    }
}
