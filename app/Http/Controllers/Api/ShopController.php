<?php


namespace App\Http\Controllers\Api;


use App\Actions\Category\SaveCategory\SaveCategoryAction;
use App\Actions\Category\SaveCategory\SaveCategoryRequest;
use App\Actions\Product\SaveProduct\SaveProductAction;
use App\Actions\Product\SaveProduct\SaveProductRequest;
use App\Http\Requests\ValidateSaveCategoryRequest;
use App\Http\Requests\ValidateSaveProductRequest;
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
     * ShopController constructor.
     */
    public function __construct(
        SaveCategoryAction $saveCategoryAction,
        SaveProductAction $saveProductAction
    )
    {
        $this->saveCategoryAction = $saveCategoryAction;
        $this->saveProductAction = $saveProductAction;
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

    protected function successResponse(array $data, int $statusCode = JsonResponse::HTTP_OK): JsonResponse
    {
        return JsonResponse::create(['data' => $data], $statusCode);
    }
}
