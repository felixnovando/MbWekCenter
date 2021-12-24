<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Angsa',
            'description' => 'Daging dan telur angsa banyak diminati oleh warga desa',
            'image' => 'angsa.jpg',
            'stock' => 50,
            'price' => 80000,
            'type_id' => 2
        ]);
        DB::table('products')->insert([
            'title' => 'Ayam Kampung',
            'description' => 'Ayam kampung dipercaya lebih higenis dan berkualitas dibanding ayam negeri',
            'image' => 'ayam_kampung.jpg',
            'stock' => 30,
            'price' => 58000,
            'type_id' => 2
        ]);
        DB::table('products')->insert([
            'title' => 'Ayam Negeri',
            'description' => 'Ayam negeri murah dan memiliki daging yang banyak',
            'image' => 'ayam_negeri.jpg',
            'stock' => 100,
            'price' => 30000,
            'type_id' => 2
        ]);
        DB::table('products')->insert([
            'title' => 'Babi',
            'description' => 'Babi jenis peliharaan yang rasanya tidak kalah dengan daging sapi',
            'image' => 'babi.jpg',
            'stock' => 60,
            'price' => 2000000,
            'type_id' => 1
        ]);
        DB::table('products')->insert([
            'title' => 'Babi Hutan',
            'description' => 'Babi Hutan adalah babi liar yang sering diburu oleh suku pedalaman, memiliki daging yang khas',
            'image' => 'babi_hutan.jpg',
            'stock' => 20,
            'price' => 3500000,
            'type_id' => 1
        ]);
        DB::table('products')->insert([
            'title' => 'Bebek',
            'description' => 'Telur bebek sering dijadikan telur asin, dan orang suka daging bebek',
            'image' => 'bebek.jpg',
            'stock' => 120,
            'price' => 52000,
            'type_id' => 2
        ]);
        DB::table('products')->insert([
            'title' => 'Kambing',
            'description' => 'Kambing kambing muda dapat dipelihara, dan susu kambing dipercaya memiliki khasiat yang lebih',
            'image' => 'kambing.jpg',
            'stock' => 20,
            'price' => 3330000,
            'type_id' => 1
        ]);
        DB::table('products')->insert([
            'title' => 'Sapi Madura',
            'description' => 'Sapi kesukaan orang madura untuk daging kurban',
            'image' => 'sapi_madura.jpg',
            'stock' => 10,
            'price' => 10000000,
            'type_id' => 1
        ]);
        DB::table('products')->insert([
            'title' => 'Sapi Perah',
            'description' => 'Minuman susu sapi berasal dari sapi ini',
            'image' => 'sapi_perah.jpg',
            'stock' => 20,
            'price' => 12000000,
            'type_id' => 1
        ]);
        DB::table('products')->insert([
            'title' => 'Ikan Nila',
            'description' => 'Nila goreng sering menjadi menu di restoran',
            'image' => 'nila.jpg',
            'stock' => 100,
            'price' => 23000,
            'type_id' => 3
        ]);
        DB::table('products')->insert([
            'title' => 'Ikan Lele',
            'description' => 'Ikan Lele memiliki khasiat lebih, dan enak untuk digoreng',
            'image' => 'lele.jpg',
            'stock' => 120,
            'price' => 18000,
            'type_id' => 3
        ]);
        DB::table('products')->insert([
            'title' => 'Apel',
            'description' => 'Apel hasil budi daya MbWekCenter',
            'image' => 'apel.jpg',
            'stock' => 200,
            'price' => 4500,
            'type_id' => 4
        ]);
        DB::table('products')->insert([
            'title' => 'Apel',
            'description' => 'aneka Pisang hasil budi daya MbWekCenter',
            'image' => 'pisang.jpg',
            'stock' => 150,
            'price' => 16000,
            'type_id' => 4
        ]);
    }
}
