<?php


namespace App\Actions\Product\SaveProduct;


class SaveProductRequest
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $price;
    /**
     * @var int
     */
    private $amount;
    /**
     * @var array
     */
    private $categories;

    /**
     * SaveProductRequest constructor.
     */
    public function __construct(string $name , int $price , int $amount , array $categories)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
        $this->categories = $categories;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
}
