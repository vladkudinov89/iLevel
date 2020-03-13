<?php


namespace App\Actions\Category\GetCategoryAndProductBySlug;


use App\Entities\Category;
use App\Entities\Product;

class GetCategoryAndProductBySlugResponse
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
    public function __construct(array $category)
    {
        $this->category = $category;
    }

    public function categories(): array
    {
        return $this->category;
    }
}
