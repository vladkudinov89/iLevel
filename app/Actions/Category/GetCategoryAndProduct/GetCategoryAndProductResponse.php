<?php


namespace App\Actions\Category\GetCategoryAndProduct;


use App\Entities\Category;
use App\Entities\Product;
use Illuminate\Database\Eloquent\Collection;

class GetCategoryAndProductResponse
{
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Product
     */
    private $product;

    /**
     * GetCategoryAndProductResponse constructor.
     */
    public function __construct(array $category ,array $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function categories(): array
    {
        return $this->category;
    }

    public function products(): array
    {
        return $this->product;
    }
}
