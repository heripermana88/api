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
        $products = [
            [
                'name' => 'Bajigur',
                'description' => 'ini Bajigur',
                'sku' => 'BJG30267',
                'primaryImage' => "https://i.picsum.photos/id/161/800/600.jpg?hmac=aeLn8nHk_nKBC3FFiZzmwF8WwYvc8Idd8JMt7HteW50",
                'stock' => 12,
                'price' => 1500,
            ],
            [
                'name' => 'Kacang Garuda',
                'description' => 'ini Kacang Garuda',
                'sku' => 'KCG78537',
                'primaryImage' => "https://i.picsum.photos/id/161/800/600.jpg?hmac=aeLn8nHk_nKBC3FFiZzmwF8WwYvc8Idd8JMt7HteW50",
                'stock' => 13,
                'price' => 1000,
            ],
            [
                'name' => 'Ale ale',
                'description' => 'ini Ale ale',
                'sku' => 'DRG23874',
                'primaryImage' => "https://i.picsum.photos/id/161/800/600.jpg?hmac=aeLn8nHk_nKBC3FFiZzmwF8WwYvc8Idd8JMt7HteW50",
                'stock' => 14,
                'price' => 2000,
            ],
            [
                'name' => 'Pocari',
                'description' => 'ini Pocari',
                'sku' => 'DRG54326',
                'primaryImage' => "https://i.picsum.photos/id/161/800/600.jpg?hmac=aeLn8nHk_nKBC3FFiZzmwF8WwYvc8Idd8JMt7HteW50",
                'stock' => 15,
                'price' => 3500,
            ],
            [
                'name' => 'Indomie',
                'description' => 'ini Indomie',
                'sku' => 'MIE87654',
                'primaryImage' => "https://i.picsum.photos/id/161/800/600.jpg?hmac=aeLn8nHk_nKBC3FFiZzmwF8WwYvc8Idd8JMt7HteW50",
                'stock' => 16,
                'price' => 7550,
            ],
        ];
        foreach ($products as $key => $value) {
            DB::table('products')->insert($value);
        }
    }
}
