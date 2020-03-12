<?php

use App\Entities\Category;
use App\Entities\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = factory(Category::class, 4)
            ->create()
            ->each(function ($category) use ($faker) {
                $category
                    ->products()
                    ->saveMany(
                        factory(Product::class, $faker->numberBetween(1, 4))
                            ->make()
                    );
            });
    }
}
