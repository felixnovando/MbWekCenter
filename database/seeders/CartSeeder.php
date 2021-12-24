<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
           'product_id' => 1,
           'user_id' => 2,
           'qty' =>  5
        ]);
        DB::table('carts')->insert([
            'product_id' => 2,
           'user_id' => 2,
           'qty' =>  4
        ]);
    }
}
