<?php


namespace App\Actions\Category\GetCategoryAndProduct;


use App\Actions\Presenter\CategoryPresenter;
use App\Actions\Presenter\ProductPresenter;
use App\Repositories\Shop\Category\CategoryRepositoryInterface;
use App\Repositories\Shop\Product\ProductRepositoryInterface;

class GetCategoryAndProductAction
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
     * GetCategoryAndProductAction constructor.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository , ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function execute(GetCategoryAndProductRequest $response): GetCategoryAndProductResponse
    {
        $categories = $this->categoryRepository->findAll();
        $products = $this->productRepository->findAll();

        foreach ($categories as $category) {
            $categories1[] = CategoryPresenter::present($category);
        }

        foreach ($products as $product) {
            $products1[] = ProductPresenter::present($product);
        }

        return new GetCategoryAndProductResponse($categories1 , $products1);

    }
}
