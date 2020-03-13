<?php


namespace App\Http\Controllers\Api;


use App\Actions\Category\SaveCategory\SaveCategoryAction;
use App\Actions\Category\SaveCategory\SaveCategoryRequest;
use App\Http\Requests\ValidateSaveCategoryRequest;
use Illuminate\Http\JsonResponse;

class ShopController
{
    /**
     * @var SaveCategoryAction
     */
    private $saveCategoryAction;

    /**
     * ShopController constructor.
     */
    public function __construct(SaveCategoryAction $saveCategoryAction)
    {
        $this->saveCategoryAction = $saveCategoryAction;
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

    protected function successResponse(array $data, int $statusCode = JsonResponse::HTTP_OK): JsonResponse
    {
        return JsonResponse::create(['data' => $data], $statusCode);
    }
}
