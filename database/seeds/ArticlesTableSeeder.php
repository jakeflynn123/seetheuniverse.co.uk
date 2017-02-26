<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            ['id' => 1, 'name' => 'New Article Name1', 'content' => 'article content goes here'],
            ['id' => 2, 'name' => 'New Article Name2', 'content' => 'article content goes here'],
            ['id' => 3, 'name' => 'New Article Name3', 'content' => 'article content goes here'],
            ['id' => 4, 'name' => 'New Article Name4', 'content' => 'article content goes here'],
        ]);
    }
}
