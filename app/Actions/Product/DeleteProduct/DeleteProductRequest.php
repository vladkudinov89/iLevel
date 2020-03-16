<?php


namespace App\Actions\Product\DeleteProduct;


class DeleteProductRequest
{
    /**
     * @var int
     */
    private $id;

    /**
     * DeleteProductRequest constructor.
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
