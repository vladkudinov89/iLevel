<?php


namespace App\Actions\Category\GetCategoryAndProductBySlug;


use App\Actions\Presenter\CategoryPresenter;
use App\Repositories\Shop\Category\CategoryRepositoryInterface;
use App\Repositories\Shop\Product\ProductRepositoryInterface;

class GetCategoryAndProductBySlugAction
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * GetCategoryAndProductBySlugAction constructor.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository , ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function execute(GetCategoryAndProductBySlugRequest $request): GetCategoryAndProductBySlugResponse
    {
        $category = $this->categoryRepository->getBySlug($request->getSlug());

        $categoryPresenter = CategoryPresenter::collectionPresent($category);

        return new GetCategoryAndProductBySlugResponse($categoryPresenter);
    }
}
