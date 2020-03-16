<?php


namespace App\Actions\Category\DeleteCategory;


use App\Exceptions\Category\CategoryDoesNotExistException;
use App\Repositories\Shop\Category\CategoryRepositoryInterface;

class DeleteCategoryAction
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * DeleteCategoryAction constructor.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(DeleteCategoryRequest $request): void
    {
        $category = $this->categoryRepository->getById($request->getId());

        if(! $category){
            throw new CategoryDoesNotExistException();
        }

        if(isset($category->products)){
            foreach ($category->products as $product) {
                $category->products()->detach($product);
            }
        }

        $this->categoryRepository->deleteById($category->id);
    }
}
