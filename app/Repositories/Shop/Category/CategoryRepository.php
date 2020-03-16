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

    public function getBySlug(string $slug): Collection
    {
        return Category::where('slug' , $slug)->get();
    }

    public function getById(int $id): ?Category
    {
        return Category::find($id);
    }


    public function save(Category $category): Category
    {
        $category->save();

        return $category;
    }

    public function deleteById(int $id): void
    {
        Category::destroy($id);
    }

}
