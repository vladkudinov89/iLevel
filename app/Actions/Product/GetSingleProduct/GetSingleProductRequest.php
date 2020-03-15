<?php


namespace App\Actions\Product\GetSingleProduct;


use App\Entities\Product;

class GetSingleProductRequest
{
    /**
     * @var Product
     */
    private $product;

    /**
     * GetSingleProductRequest constructor.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getId(): int
    {
        return $this->product->id;
    }

    public function getSlug(): string
    {
        return $this->product->slug;
    }
}
