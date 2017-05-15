<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['name' => 'Sci-fi'],
            ['name' => 'Novel'],
            ['name' => 'Biography'],
            ['name' => 'Comic'],
            ['name' => 'Social'],
            ['name' => 'Information Technology'],
            ['name' => 'Cook']
        ]);
    }
}
