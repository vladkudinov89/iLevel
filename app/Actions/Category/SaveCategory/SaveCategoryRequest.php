<?php


namespace App\Actions\Category\SaveCategory;


class SaveCategoryRequest
{
    /**
     * @var string
     */
    private $name;

    /**
     * SaveCategoryRequest constructor.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
