<?php


namespace App\Actions\Presenter;


use App\Entities\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryPresenter
{
    public static function present(Category $category): array
    {
        return [
            'category_id' => $category->id,
            'category_name' => $category->name,
            'category_slug' => $category->slug,
            'category_products' => count($category->products)
        ];
    }

    public static function collectionPresent(Collection $category)
    {
        return [
            'category_id' => $category[0]->id,
            'category_name' => $category[0]->name,
            'category_slug' => $category[0]->slug,
            'category_products' => $category[0]->products
        ];
    }
}
