<?php


namespace App\Actions\Category\SaveCategory;


use App\Entities\Category;
use App\Repositories\Shop\Category\CategoryRepositoryInterface;

class SaveCategoryAction
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * SaveCategoryAction constructor.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(SaveCategoryRequest $request): SaveCategoryResponse
    {

        $categorySave = new Category([
            'name' => $request->getName(),
            'slug' => strtolower(str_slug($request->getName()))
        ]);

        $category = $this->categoryRepository->save($categorySave);

        return new SaveCategoryResponse($category);
    }
}
