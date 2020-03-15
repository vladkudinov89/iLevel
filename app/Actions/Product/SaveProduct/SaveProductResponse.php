<?php


namespace App\Actions\Product\SaveProduct;

use App\Entities\Product;

class SaveProductResponse
{
    /**
     * @var Product
     */
    private $product;

    /**
     * SaveProductResponse constructor.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getModel(): Product
    {
        return $this->product;
    }

    public function toArray(): array
    {
        return $this->product->toArray();
    }
}
