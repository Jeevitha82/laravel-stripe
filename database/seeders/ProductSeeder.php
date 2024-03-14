<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $product = [
            ['name'=>'Laptop','price_id'=>'price_1Ou4IqSJw92f6pKpgVKDAaTF','price'=>'10000','description'=>'Black color'],
            ['name'=>'Mobile','price_id'=>'price_1Ou4sOSJw92f6pKpuc1uEMEH','price'=>'5000','description'=>'White color'],
            ['name'=>'Fridge','price_id'=>'price_1Ou4tPSJw92f6pKpqO8gmfCt','price'=>'15000','description'=>'Red color'],
            ['name'=>'TV','price_id'=>'price_1Ou4uMSJw92f6pKpmNQkIJgp','price'=>'12000','description'=>'Grey color'],
            ['name'=>'Radio','price_id'=>'price_1Ou4vHSJw92f6pKps6tTjxht','price'=>'3000','description'=>'Blue color'],
            ['name'=>'Headphones','price_id'=>'price_1Ou4w1SJw92f6pKpbAnpnI9V','price'=>'1000','description'=>'Green color'],
        ];

        DB::table('products')->insert($product);
    }
}
