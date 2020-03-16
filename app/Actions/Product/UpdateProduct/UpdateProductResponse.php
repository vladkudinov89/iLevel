<?php


namespace App\Actions\Product\UpdateProduct;


use App\Entities\Product;

class UpdateProductResponse
{
    /**
     * @var Product
     */
    private $product;

    /**
     * UpdateProductResponse constructor.
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

    public function getProductSlug(): string
    {
        return $this->product->slug;
    }
}
