<?php


namespace App\Actions\Presenter;


use App\Entities\Category;

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
}
