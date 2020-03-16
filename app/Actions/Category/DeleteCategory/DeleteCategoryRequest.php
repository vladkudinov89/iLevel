<?php


namespace App\Actions\Category\DeleteCategory;


class DeleteCategoryRequest
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
