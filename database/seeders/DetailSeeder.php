<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
           'transaction_id' => 1,
           'product_id' => 1,
           'qty' => 3,
        ]);
        DB::table('details')->insert([
            'transaction_id' => 1,
            'product_id' => 2,
            'qty' => 4,
        ]);
        DB::table('details')->insert([
            'transaction_id' => 2,
            'product_id' => 3,
            'qty' => 1,
        ]);
        DB::table('details')->insert([
            'transaction_id' => 2,
            'product_id' => 4,
            'qty' => 2,
        ]);
        DB::table('details')->insert([
            'transaction_id' => 2,
            'product_id' => 5,
            'qty' => 5,
        ]);
    }
}
