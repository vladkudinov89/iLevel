<?php


namespace App\Actions\Category\SaveCategory;


use App\Entities\Category;

class SaveCategoryResponse
{
    /**
     * @var Category
     */
    private $category;

    /**
     * SaveCategoryResponse constructor.
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getModel(): Category
    {
        return $this->category;
    }

    public function toArray(): array
    {
        return $this->category->toArray();
    }
}
