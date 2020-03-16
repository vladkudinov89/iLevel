<?php


namespace App\Http\Controllers\Api;


use App\Actions\Category\DeleteCategory\DeleteCategoryAction;
use App\Actions\Category\DeleteCategory\DeleteCategoryRequest;
use App\Actions\Category\SaveCategory\SaveCategoryAction;
use App\Actions\Category\SaveCategory\SaveCategoryRequest;
use App\Actions\Category\UpdateCategory\UpdateCategoryAction;
use App\Actions\Category\UpdateCategory\UpdateCategoryRequest;
use App\Actions\Product\DeleteProduct\DeleteProductAction;
use App\Actions\Product\DeleteProduct\DeleteProductRequest;
use App\Actions\Product\SaveProduct\SaveProductAction;
use App\Actions\Product\SaveProduct\SaveProductRequest;
use App\Actions\Product\UpdateProduct\UpdateProductAction;
use App\Actions\Product\UpdateProduct\UpdateProductRequest;
use App\Entities\Category;
use App\Entities\Product;
use App\Http\Requests\ValidateSaveCategoryRequest;
use App\Http\Requests\ValidateSaveProductRequest;
use App\Http\Requests\ValidateUpdateCategoryRequest;
use App\Http\Requests\ValidateUpdateProductRequest;
use Illuminate\Http\JsonResponse;

class ShopController
{
    /**
     * @var SaveCategoryAction
     */
    private $saveCategoryAction;
    /**
     * @var SaveProductAction
     */
    private $saveProductAction;
    /**
     * @var UpdateCategoryAction
     */
    private $updateCategoryAction;
    /**
     * @var UpdateProductAction
     */
    private $updateProductAction;
    /**
     * @var DeleteProductAction
     */
    private $deleteProductAction;
    /**
     * @var DeleteCategoryAction
     */
    private $deleteCategoryAction;

    /**
     * ShopController constructor.
     */
    public function __construct(
        SaveCategoryAction $saveCategoryAction,
        SaveProductAction $saveProductAction,
        UpdateCategoryAction $updateCategoryAction,
        UpdateProductAction $updateProductAction,
        DeleteProductAction $deleteProductAction,
        DeleteCategoryAction $deleteCategoryAction
    )
    {
        $this->saveCategoryAction = $saveCategoryAction;
        $this->saveProductAction = $saveProductAction;
        $this->updateCategoryAction = $updateCategoryAction;
        $this->updateProductAction = $updateProductAction;
        $this->deleteProductAction = $deleteProductAction;
        $this->deleteCategoryAction = $deleteCategoryAction;
    }

    public function store_category(ValidateSaveCategoryRequest $request)
    {

        try {
            $categorySave = $this->saveCategoryAction->execute(new SaveCategoryRequest(
                $request->name
            ));
        } catch (\Exception $e) {
            return $this->$e->getCode();
        }

        if (request()->wantsJson()) {
            return $this->successResponse($categorySave->toArray(), 201);
        }

        return redirect()->route('shop.index')
            ->with('status', 'New category created.');
    }

    public function store_product(ValidateSaveProductRequest $request)
    {
        try {
            $productSave = $this->saveProductAction->execute(new SaveProductRequest(
                $request->name,
                $request->price,
                $request->amount,
                $request->categories
            ));
        } catch (\Exception $e) {
            return $this->$e->getCode();
        }

        if (request()->wantsJson()) {
            return $this->successResponse($productSave->toArray(), 201);
        }

        return redirect()->route('shop.index')
            ->with('status', 'New product created.');
    }

    public function update_category(ValidateUpdateCategoryRequest $request, Category $category)
    {
        $updateCategoryResponse = $this->updateCategoryAction->execute(new UpdateCategoryRequest(
            $category->id,
            $request->name
        ));

        if (request()->wantsJson()) {
            return $this->successResponse($updateCategoryResponse->toArray(), 201);
        }

        return redirect()->route('shop.category.show', $updateCategoryResponse->getCatalogSlug());
    }

    public function update_product(ValidateUpdateProductRequest $request, Product $product)
    {
        $updateProduct = $this->updateProductAction->execute(new UpdateProductRequest(
            $product->id,
            $request->name,
            $request->price,
            $request->amount,
            $request->categories
        ));

        if (request()->wantsJson()) {
            return $this->successResponse($updateProduct->toArray(), 201);
        }

        return redirect()->route('shop.product.show', $updateProduct->getProductSlug());
    }

    public function category_destroy(int $catalog)
    {
        $this->deleteCategoryAction->execute(new DeleteCategoryRequest($catalog));

        if (request()->wantsJson()) {
            return $this->emptyResponse(200);
        }

        return redirect()->route('shop.index')
            ->with('status', 'Category Success Deleted!');
    }

    public function product_destroy(int $product)
    {
        $this->deleteProductAction->execute(new DeleteProductRequest($product));

        if (request()->wantsJson()) {
            return $this->emptyResponse(200);
        }

        return redirect()->route('shop.index')
            ->with('status', 'Product Success Deleted!');
    }

    protected function successResponse(array $data, int $statusCode = JsonResponse::HTTP_OK): JsonResponse
    {
        return JsonResponse::create(['data' => $data], $statusCode);
    }

    protected function emptyResponse(int $statusCode = 200): JsonResponse
    {
        return JsonResponse::create(null, $statusCode);
    }
}
