<?php


namespace App\Repositories\Shop\Product;

use Illuminate\Database\Eloquent\Collection;
use App\Entities\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function findAll(): Collection
    {
        return Product::all();
    }

    public function getBySlug(string $slug): Collection
    {
        return Product::where('slug' , $slug)->get();
    }


    public function getById(int $id): ?Product
    {
        return Product::find($id);
    }

    public function save(Product $product): Product
    {
        $product->save();

        return $product;
    }

    public function deleteById(int $id): void
    {
        Product::destroy($id);
    }

}
