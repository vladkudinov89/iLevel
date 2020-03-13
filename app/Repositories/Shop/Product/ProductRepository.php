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

    public function getById(int $id): ?Product
    {
        // TODO: Implement getById() method.
    }

    public function save(Product $product): Product
    {
        // TODO: Implement save() method.
    }

    public function deleteById(int $id): void
    {
        // TODO: Implement deleteById() method.
    }

}
