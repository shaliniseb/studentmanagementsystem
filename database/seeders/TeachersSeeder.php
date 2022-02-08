<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert(array(
            array(
            'name' => "Steve"
            ),
            array(
            'name' => "Laura"
            ),
            array(
                'name' => "John"
            ),
            array(
                'name' => "Charles"
            ),
            array(
                'name' => "Anna"
            ),
            array(
                'name' => "Mia"
                )
            ));
    }
}
