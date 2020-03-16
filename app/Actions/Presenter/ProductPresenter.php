<?php


namespace App\Actions\Presenter;


use App\Entities\Product;
use Illuminate\Database\Eloquent\Collection;

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

    public static function collectionPresent(Collection $product)
    {
        return [
            'product_id' => $product[0]->id,
            'product_name' => $product[0]->name,
            'product_slug' => $product[0]->slug,
            'product_price' => $product[0]->price,
            'product_amount' => $product[0]->amount,
            'product_categories' => $product[0]->categories->toArray()
        ];
    }
}
