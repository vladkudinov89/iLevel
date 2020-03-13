<?php


namespace App\Repositories\Shop\Product;

use Illuminate\Database\Eloquent\Collection;
use App\Entities\Product;

interface ProductRepositoryInterface
{
    public function findAll() :Collection;

    public function getById(int $id): ?Product;

    public function save(Product $product): Product;

    public function deleteById(int $id): void;
}
