<?php


namespace App\Actions\Category\UpdateCategory;


use App\Repositories\Shop\Category\CategoryRepositoryInterface;

class UpdateCategoryAction
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * UpdateCategoryAction constructor.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(UpdateCategoryRequest $request): UpdateCategoryResponse
    {
        $updateCategory = $this->categoryRepository->getById($request->getId());

        $updateCategory->name = $request->getName();
        $updateCategory->slug =  strtolower(str_slug($request->getName()));

        $category = $this->categoryRepository->save($updateCategory);

        return new UpdateCategoryResponse($category);
    }
}
