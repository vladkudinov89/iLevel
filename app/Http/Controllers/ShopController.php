<?php

namespace App\Http\Controllers;

use App\Actions\Category\GetCategoryAndProduct\GetCategoryAndProductAction;
use App\Actions\Category\GetCategoryAndProduct\GetCategoryAndProductRequest;
use App\Actions\Category\GetCategoryAndProduct\GetCategoryAndProductResponse;
use App\Actions\Presenter\CategoryPresenter;
use App\Entities\Category;
use App\Entities\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * @var GetCategoryAndProductAction
     */
    private $categoryAndProductAction;
    /**
     * @var GetCategoryAndProductResponse
     */
    private $categoryAndProductResponse;

    /**
     * ShopController constructor.
     */
    public function __construct(
        GetCategoryAndProductAction $categoryAndProductAction
    )
    {
        $this->categoryAndProductAction = $categoryAndProductAction;
    }

    public function index()
    {
        $responseShopCategory = $this->categoryAndProductAction->execute(new GetCategoryAndProductRequest());

        return view('shop.index', [
            'products' => $responseShopCategory->products(),
            'categories' => $responseShopCategory->categories()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
