<?php

use Illuminate\Database\Seeder;
use \Faker\Factory as Faker;
use \App\Product;

class ProductSeeder extends Seeder
{
    private $faker = null;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    private function createProducts(int $count)
    {
        for ($i = 1; $i <= $count; $i++) {
            $product = new Product();
            $product->name = $this->faker->word;
            $product->amount = $this->faker->numberBetween(0, 50);
            $saved = $product->save();

            if ($saved) {
                echo $i.' Dodano nowy product o nazwie: ' . $product->name . "\n";
            }


        }
    }

    public function run()
    {
        $this->createProducts(100);
    }
}
