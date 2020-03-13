<?php

namespace Tests\Feature;

use App\Entities\Category;
use App\Entities\Product;
use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_get_all_tasks_index()
    {
        $jonh = factory(User::class)->create(['name' => 'JohnDoe']);

        $categories = factory(Category::class, 4)
            ->create()
            ->each(function ($category) {
                $category
                    ->products()
                    ->saveMany(
                        factory(Product::class, 3)
                            ->make()
                    );
            });

        $response = $this
            ->signIn($jonh)
            ->get('/')
            ->assertStatus(200)
            ->getOriginalContent();

        $this->assertEquals($categories[0]->name, $response['categories'][0]['category_name']);
        $this->assertEquals($categories[0]->id, $response['products'][0]['product_category'][0]['id']);
    }

    /** @test */
    public function get_category_by_slug()
    {
        $jonh = factory(User::class)->create(['name' => 'JohnDoe']);

        $categories = factory(Category::class, 4)
            ->create()
            ->each(function ($category) {
                $category
                    ->products()
                    ->saveMany(
                        factory(Product::class, 3)
                            ->make()
                    );
            });

        $response = $this
            ->signIn($jonh)
            ->get('/category/' . $categories[0]->slug)
            ->assertStatus(200)
            ->getOriginalContent();

        $this->assertEquals($categories[0]->slug, $response['category']['category_slug']);
    }

    /** @test */
    public function auth_user_can_save_new_category()
    {
        $jonh = factory(User::class)->create(['name' => 'JohnDoe']);

        $this->signIn($jonh);

        $category = factory(Category::class)->make();

        $response = $this
            ->post('/api/category', $category->toArray());

        $this->assertDatabaseHas('categories', [
            'name' => $category->name
        ]);

        $this->get($response->headers->get('Location'))
            ->assertSee($category->name);
    }


}
