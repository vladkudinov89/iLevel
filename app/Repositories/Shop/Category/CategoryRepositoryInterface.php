<?php


namespace App\Repositories\Shop\Category;


use App\Entities\Category;

interface CategoryRepositoryInterface
{
    public function findAll();

    public function getById(int $id): ?Category;

    public function save(Category $category): Category;

    public function deleteById(int $id): void;
}
