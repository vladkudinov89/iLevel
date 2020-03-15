<?php


namespace App\Http\Controllers\Api;


use App\Actions\Category\SaveCategory\SaveCategoryAction;
use App\Actions\Category\SaveCategory\SaveCategoryRequest;
use App\Actions\Category\UpdateCategory\UpdateCategoryAction;
use App\Actions\Category\UpdateCategory\UpdateCategoryRequest;
use App\Actions\Product\SaveProduct\SaveProductAction;
use App\Actions\Product\SaveProduct\SaveProductRequest;
use App\Entities\Category;
use App\Http\Requests\ValidateSaveCategoryRequest;
use App\Http\Requests\ValidateSaveProductRequest;
use App\Http\Requests\ValidateUpdateCategoryRequest;
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
     * ShopController constructor.
     */
    public function __construct(
        SaveCategoryAction $saveCategoryAction,
        SaveProductAction $saveProductAction,
        UpdateCategoryAction $updateCategoryAction
    )
    {
        $this->saveCategoryAction = $saveCategoryAction;
        $this->saveProductAction = $saveProductAction;
        $this->updateCategoryAction = $updateCategoryAction;
    }

    public function store_category(ValidateSaveCategoryRequest $request)
    {

        try {
            $categorySave = $this->saveCategoryAction->execute(new SaveCategoryRequest(
                $request->name
            ));
        }  catch (\Exception $e) {
            return $this->$e->getCode();
        }

        if (request()->wantsJson()) {
            return $this->successResponse($categorySave->toArray(), 201);
        }

        return redirect()->route('shop.index')
            ->with('status' , 'New category created.');
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
        }catch (\Exception $e) {
            return $this->$e->getCode();
        }

        if (request()->wantsJson()) {
            return $this->successResponse($productSave->toArray(), 201);
        }

        return redirect()->route('shop.index')
            ->with('status' , 'New product created.');
    }

    public function update_category(ValidateUpdateCategoryRequest $request , Category $category)
    {
        $updateCategoryResponse = $this->updateCategoryAction->execute(new UpdateCategoryRequest(
            $category->id,
            $request->name
        ));

        if (request()->wantsJson()) {
            return $this->successResponse($updateCategoryResponse->toArray(), 201);
        }

        return redirect()->route('shop.category.show' , $updateCategoryResponse->getCatalogSlug());
    }

    protected function successResponse(array $data, int $statusCode = JsonResponse::HTTP_OK): JsonResponse
    {
        return JsonResponse::create(['data' => $data], $statusCode);
    }
}
