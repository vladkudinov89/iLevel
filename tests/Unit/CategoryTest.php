<?php

namespace Tests\Unit;

use App\Entities\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function success_create_category()
    {
        $product = factory(Category::class)->create([
            'name' => 'category',
            'slug' => 'category-1'
        ]);

        $this->assertEquals($product->name , 'category');
        $this->assertEquals($product->slug , 'category-1');
    }

}
