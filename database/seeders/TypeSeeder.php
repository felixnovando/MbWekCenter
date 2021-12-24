<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Mamalia',
        ]);
        DB::table('types')->insert([
            'name' => 'Unggas',
        ]);
        DB::table('types')->insert([
            'name' => 'Ikan',
        ]);
        DB::table('types')->insert([
            'name' => 'Tumbuhan',
        ]);
    }
}
