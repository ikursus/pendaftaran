<?php

use Illuminate\Database\Seeder;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculty')->insert([
            'name' => 'Fakulti Kejuruteraan'
        ]);

        DB::table('faculty')->insert([
            'name' => 'Fakulti Sains Komputer'
        ]);
    }
}
