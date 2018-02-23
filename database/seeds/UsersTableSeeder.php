<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>  'admin',
            'email' => 'admin@admin.admin',
            'role' => 2,
            'password' => bcrypt('admin'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test' . '@test.test',
            'role' => 1,
            'password' => bcrypt('test'),
        ]);
    }
}
