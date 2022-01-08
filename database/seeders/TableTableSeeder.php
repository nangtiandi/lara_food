<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            'table_name' => '1'
        ]);
        DB::table('tables')->insert([
            'table_name' => '2'
        ]);
        DB::table('tables')->insert([
            'table_name' => '3'
        ]);
        DB::table('tables')->insert([
            'table_name' => '4'
        ]);
        DB::table('tables')->insert([
            'table_name' => '5'
        ]);
    
    }
}
