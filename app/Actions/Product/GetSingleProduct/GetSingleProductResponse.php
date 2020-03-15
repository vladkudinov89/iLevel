<?php


namespace App\Actions\Product\GetSingleProduct;


use App\Entities\Product;

class GetSingleProductResponse
{
    /**
     * @var Product
     */
    private $product;

    /**
     * GetSingleProductResponse constructor.
     */
    public function __construct(array $product)
    {
        $this->product = $product;
    }

    public function product()
    {
        return $this->product;
    }

    public function categories()
    {
        return $this->product['product_categories'];
    }
}
