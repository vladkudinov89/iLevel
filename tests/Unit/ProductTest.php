<?php

namespace Tests\Unit;

use App\Entities\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function success_create_product()
    {
        $product = factory(Product::class)->create([
            'name' => 'product',
            'price' => 100,
            'amount' => 10
        ]);

        $this->assertEquals($product->name , 'product');
        $this->assertEquals($product->price , 100);
        $this->assertEquals($product->amount , 10);
    }

}
