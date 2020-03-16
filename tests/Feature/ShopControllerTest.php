<?php

namespace Tests\Feature;

use App\Entities\Category;
use App\Entities\Product;
use App\Entities\User;
use App\Exceptions\Product\ProductDoesNotExistException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn(factory(User::class)->create(['name' => 'JohnDoe']));
    }

    use RefreshDatabase;


    /** @test */
    public function test_get_all_tasks_index()
    {
        $categories = $this->shopping();

        $response = $this
            ->get('/')
            ->assertStatus(200)
            ->getOriginalContent();

        $this->assertEquals($categories[0]->name, $response['categories'][0]['category_name']);
        $this->assertEquals($categories[0]->id, $response['products'][0]['product_category'][0]['id']);
    }

    /** @test */
    public function get_category_by_slug()
    {
        $categories = $this->shopping();

        $response = $this
            ->get('/category/' . $categories[0]->slug)
            ->assertStatus(200)
            ->getOriginalContent();

        $this->assertEquals($categories[0]->slug, $response['category']['category_slug']);
    }

    /** @test */
    public function auth_user_can_create_category()
    {
        $category = factory(Category::class)->make();

        $response = $this
            ->post('/api/category', $category->toArray());

        $this->assertDatabaseHas('categories', [
            'name' => $category->name
        ]);

        $this->get($response->headers->get('Location'))
            ->assertSee($category->name);
    }

    /** @test */
    public function auth_user_can_create_product()
    {
        $categories = factory(Category::class, 2)->create();
        $product = factory(Product::class)->make(['id' => 1]);

        $response = $this
            ->post('/api/product', [
                'name' => $product->name,
                'price' => $product->price,
                'amount' => $product->amount,
                'categories' => array([$categories[0]->id, $categories[1]->id])
            ]);

        $this->assertDatabaseHas('products', [
            'name' => $product->name
        ]);

        $this->get($response->headers->get('Location'))
            ->assertSee($product->name);

        foreach ($categories as $category) {
            $this->assertDatabaseHas('category_product', [
                'product_id' => $product->id,
                'category_id' => $category->id,
            ]);
        }
    }

    /** @test */
    public function auth_user_can_update_catalog()
    {
        $category = factory(Category::class)->create();

        $response = $this
            ->put('/api/category/' . $category->slug, [
                'name' => 'category_changed'
            ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'category_changed'
        ]);
    }

    /** @test */
    public function auth_user_can_update_product()
    {
        $this->withoutExceptionHandling();
        $categories = factory(Category::class, 2)->create();

        $product = factory(Product::class)->create();

        $response = $this
            ->put('/api/product/' . $product->slug, [
                'name' => 'product1',
                'price' => 999,
                'amount' => 10,
                'categories' => array([$categories[0]->id, $categories[1]->id])
            ]);

        $this->assertDatabaseHas('products', [
            'name' => 'product1',
            'price' => 999,
            'amount' => 10
        ]);

        foreach ($categories as $category) {
            $this->assertDatabaseHas('category_product', [
                'product_id' => $product->id,
                'category_id' => $category->id,
            ]);
        }
    }

    /** @test */
    public function auth_user_can_delete_product()
    {
        $categories = factory(Category::class, 2)->create();
        $product = factory(Product::class)->make(['id' => 1]);

        $response = $this
            ->post('/api/product', [
                'name' => $product->name,
                'price' => $product->price,
                'amount' => $product->amount,
                'categories' => array([$categories[0]->id, $categories[1]->id])
            ]);

        $this->assertDatabaseHas('products', [
            'name' => $product->name
        ]);

        foreach ($categories as $category) {
            $this->assertDatabaseHas('category_product', [
                'product_id' => $product->id,
                'category_id' => $category->id,
            ]);
        }

        $response = $this
            ->delete('/api/product/' . $product->id);

        $this->assertDatabaseMissing('products', $product->toArray());

        foreach ($categories as $category) {
            $this->assertDatabaseMissing('category_product', [
                'product_id' => $product->id,
                'category_id' => $category->id,
            ]);
        }
    }

    /** @test */
    public function auth_user_can_delete_category()
    {
        $categories = $this->shopping();

        $response = $this
            ->delete('/api/category/' . $categories[0]->id);

        foreach ($categories as $category) {
            $this->assertDatabaseMissing('category_product', [
                'category_id' => $categories[0]->id
            ]);
        }
    }


    private function shopping()
    {
        return factory(Category::class, 4)
            ->create()
            ->each(function ($category) {
                $category
                    ->products()
                    ->saveMany(
                        factory(Product::class, 3)
                            ->make()
                    );
            });
    }

}
