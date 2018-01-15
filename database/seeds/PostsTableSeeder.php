<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' =>  'Lorem title',
            'description' => 'Lorem description',
            'content' => 'Lorem content',
            'category_id' => 1,
        ]);
    }
}
