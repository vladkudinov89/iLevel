<?php


namespace App\Actions\Category\GetCategory;


use App\Actions\Presenter\CategoryPresenter;
use App\Repositories\Shop\Category\CategoryRepositoryInterface;

class GetCategoryAction
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;


    /**
     * GetCategoryAction constructor.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(): GetCategoryResponse
    {
        $categories = $this->categoryRepository->findAll();
        foreach ($categories as $category) {
            $categories1[] = CategoryPresenter::arrayPresent($category);
        }

        return new GetCategoryResponse($categories1);
    }
}
