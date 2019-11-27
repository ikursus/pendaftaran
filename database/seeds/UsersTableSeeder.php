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
        // Connection ke table users
        // User 1
        DB::table('users')->insert([
            'name' => 'Ali Bin Abu',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('demo'),
            'role' => 'admin'
        ]);
        // User 2
        DB::table('users')->insert([
            'name' => 'Ahmad Bin Abu',
            'email' => 'ahmad@gmail.com',
            'password' => bcrypt('demo'),
            'role' => 'admin'
        ]);
        // User 3
        DB::table('users')->insert([
            'name' => 'Siti Bin Abu',
            'email' => 'siti@gmail.com',
            'password' => bcrypt('demo'),
            'role' => 'staff'
        ]);
        // User 4
        DB::table('users')->insert([
            'name' => 'Jamal Bin Abu',
            'email' => 'jamal@gmail.com',
            'password' => bcrypt('demo'),
            'role' => 'staff'
        ]);
        // User 5
        DB::table('users')->insert([
            'name' => 'Rahman Bin Abu',
            'email' => 'rahman@gmail.com',
            'password' => bcrypt('demo'),
            'role' => 'staff'
        ]);
    }
}
