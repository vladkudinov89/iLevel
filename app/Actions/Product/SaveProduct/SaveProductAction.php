<?php


namespace App\Actions\Product\SaveProduct;


use App\Entities\Product;
use App\Repositories\Shop\Category\CategoryRepositoryInterface;
use App\Repositories\Shop\Product\ProductRepositoryInterface;

class SaveProductAction
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * GetCategoryAndProductAction constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(SaveProductRequest $request): SaveProductResponse
    {
        $productSave = new Product([
            'name' => $request->getName(),
            'slug' =>  strtolower(str_slug($request->getName())),
            'price' => $request->getPrice(),
            'amount' => $request->getAmount()
        ]);

        $product = $this->productRepository->save($productSave);

        foreach ($request->getCategories() as $category) {
            $product->categories()->attach($category);
        }

        return new SaveProductResponse($product);
    }
}
