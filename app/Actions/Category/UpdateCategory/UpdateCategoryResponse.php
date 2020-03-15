<?php


namespace App\Actions\Category\UpdateCategory;


use App\Entities\Category;

class UpdateCategoryResponse
{
    /**
     * @var Category
     */
    private $category;

    /**
     * UpdateCategoryResponse constructor.
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

    public function getCatalogSlug(): string
    {
        return $this->category->slug;
    }
}
