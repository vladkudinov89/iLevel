<?php


namespace App\Actions\Category\GetCategory;


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
        return new GetCategoryResponse($this->categoryRepository->findAll());
    }
}
