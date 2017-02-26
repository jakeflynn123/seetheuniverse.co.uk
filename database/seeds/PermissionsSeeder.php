<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'see_all_articles', 'detail' => 'Lets them see all the articles'],
            ['id' => 2, 'name' => 'see_all_categories', 'detail' => 'Lets them see all the categories'],
            ['id' => 3, 'name' => 'see_all_roles', 'detail' => 'Lets them see all the roles'],
            ['id' => 4, 'name' => 'see_all_users', 'detail' => 'Lets them see all the users'],
            ['id' => 5, 'name' => 'see_all_permissions', 'detail' => 'Lets them see all the permissions'],
            ['id' => 6, 'name' => 'create_role', 'detail' => 'Lets them create an role'],
            ['id' => 7, 'name' => 'create_permission', 'detail' => 'Lets them create an permission'],
            ['id' => 8, 'name' => 'create_article', 'detail' => 'Lets them create an article'],
            ['id' => 9, 'name' => 'create_category', 'detail' => 'Lets them create an category'],
            ['id' => 10, 'name' => 'create_user', 'detail' => 'Lets them create an user'],
            ['id' => 11, 'name' => 'see_adminnav', 'detail' => 'gives them the adminnav'],
            ['id' => 12, 'name' => 'see_creatornav', 'detail' => 'gives them the creator nav'],
        ]);
    }
}
