<?php


namespace App\Actions\Product\UpdateProduct;


use App\Repositories\Shop\Product\ProductRepositoryInterface;

class UpdateProductAction
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * UpdateProductAction constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(UpdateProductRequest $request): UpdateProductResponse
    {
        $updateProduct = $this->productRepository->getById($request->getId());

        $updateProduct->name = $request->getName();
        $updateProduct->price = $request->getPrice();
        $updateProduct->amount = $request->getAmount();

        $product = $this->productRepository->save($updateProduct);

        foreach ($this->productRepository->findAll() as $category1) {
            $product->categories()->detach($category1);
        }

        foreach ($request->getCategories() as $category) {
            if(! $product->categories->contains($category)){
                $product->categories()->attach($category);
            }
        }

        return new UpdateProductResponse($product);
    }
}
