<?php


namespace App\Repositories\Shop\Product;


use App\Entities\Product;

interface ProductRepositoryInterface
{
    public function findAll();

    public function getById(int $id): ?Product;

    public function save(Product $product): Product;

    public function deleteById(int $id): void;
}
