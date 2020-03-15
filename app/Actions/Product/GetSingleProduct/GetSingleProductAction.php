<?php


namespace App\Actions\Product\GetSingleProduct;


use App\Actions\Presenter\ProductPresenter;
use App\Repositories\Shop\Product\ProductRepositoryInterface;

class GetSingleProductAction
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * GetSingleProductAction constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(GetSingleProductRequest $request): GetSingleProductResponse
    {
        $product = ProductPresenter::collectionPresent($this->productRepository->getBySlug($request->getSlug()));

        return new GetSingleProductResponse($product);
    }
}
