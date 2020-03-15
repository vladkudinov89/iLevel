<?php


namespace App\Actions\Presenter;


use App\Entities\Product;

class ProductPresenter
{
    public static function present(Product $product): array
    {
        return [
            'product_id' => $product->id,
            'product_slug' => $product->slug,
            'product_name' => $product->name,
            'product_category' => $product->categories->toArray()
        ];
    }
}
