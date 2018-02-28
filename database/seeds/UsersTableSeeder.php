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
            'role' => 1, // admin
            'password' => Hash::make('admin' . 'admin@admin.admin'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.test',
            'role' => 0, // normal user
            'password' => Hash::make('test' . 'test@test.test'),
        ]);
    }
}
