<?php


namespace App\Actions\Category\UpdateCategory;


class UpdateCategoryRequest
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
     * UpdateCategoryRequest constructor.
     */
    public function __construct(int $id, string $name)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
