<?php


namespace App\Actions\Product\UpdateProduct;


class UpdateProductRequest
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $id;
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
     * UpdateCategoryRequest constructor.
     */
    public function __construct(int $id, string $name ,  int $price, int $amount , array $categories)
    {
        $this->name = $name;
        $this->id = $id;
        $this->price = $price;
        $this->amount = $amount;
        $this->categories = $categories;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
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
