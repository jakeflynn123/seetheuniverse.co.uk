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
            ['id' => 1, 'title' => 'New Article Name', 'content' => 'article content goes here', 'author' => 'Jacob Flynn'],
            ['id' => 2, 'title' => 'New Article Name', 'content' => 'article content goes here', 'author' => 'Jacob Flynn'],
            ['id' => 3, 'title' => 'New Article Name', 'content' => 'article content goes here', 'author' => 'Jacob Flynn'],
            ['id' => 4, 'title' => 'New Article Name', 'content' => 'article content goes here', 'author' => 'Jacob Flynn'],
        ]);
    }
}
