<?php


namespace App\Actions\Product\DeleteProduct;


use App\Exceptions\Product\ProductDoesNotExistException;
use App\Repositories\Shop\Product\ProductRepositoryInterface;

class DeleteProductAction
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * DeleteProductAction constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(DeleteProductRequest $request): void
    {
        $product = $this->productRepository->getById($request->getId());

        if(!$product){
            throw new ProductDoesNotExistException();
        }

        if(isset($product->categories)){
//            dd($product->categories());
            foreach ($product->categories as $category) {
//                dd($category);
                $product->categories()->detach($category);
            }
        }


        $this->productRepository->deleteById($product->id);
    }
}
