<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class dataProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Bajigur',
            'description' => 'ini Bajigur',
            'sku' => 'BJG30267',
            'primaryImage' => "https://i.picsum.photos/id/161/800/600.jpg?hmac=aeLn8nHk_nKBC3FFiZzmwF8WwYvc8Idd8JMt7HteW50",
            'stock' => 50,
            'price' => 15.5,
        ]);
    }
}
