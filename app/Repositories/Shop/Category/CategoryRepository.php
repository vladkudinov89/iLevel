<?php


namespace App\Repositories\Shop\Category;

use Illuminate\Database\Eloquent\Collection;
use App\Entities\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function findAll(): Collection
    {
        return Category::all();
    }

    public function getById(int $id): ?Category
    {
        // TODO: Implement getById() method.
    }

    public function save(Category $category): Category
    {
        // TODO: Implement save() method.
    }

    public function deleteById(int $id): void
    {
        // TODO: Implement deleteById() method.
    }

}
