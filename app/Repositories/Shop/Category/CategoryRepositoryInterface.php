<?php


namespace App\Repositories\Shop\Category;

use Illuminate\Database\Eloquent\Collection;
use App\Entities\Category;

interface CategoryRepositoryInterface
{
    public function findAll(): Collection;

    public function getBySlug(string $slug): Collection;

    public function getById(int $id): ?Category;

    public function save(Category $category): Category;

    public function deleteById(int $id): void;
}
