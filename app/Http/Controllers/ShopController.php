<?php

namespace App\Http\Controllers;

use App\Actions\Category\GetCategoryAndProduct\GetCategoryAndProductAction;
use App\Actions\Category\GetCategoryAndProduct\GetCategoryAndProductRequest;
use App\Actions\Category\GetCategoryAndProduct\GetCategoryAndProductResponse;
use App\Actions\Category\GetCategoryAndProductBySlug\GetCategoryAndProductBySlugAction;
use App\Actions\Category\GetCategoryAndProductBySlug\GetCategoryAndProductBySlugRequest;
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
     * @var GetCategoryAndProductBySlugAction
     */
    private $categoryAndProductBySlugAction;

    /**
     * ShopController constructor.
     */
    public function __construct(
        GetCategoryAndProductAction $categoryAndProductAction,
        GetCategoryAndProductBySlugAction $categoryAndProductBySlugAction
    )
    {
        $this->categoryAndProductAction = $categoryAndProductAction;
        $this->categoryAndProductBySlugAction = $categoryAndProductBySlugAction;
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
        return view('shop.create');
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
    public function show(string $slug)
    {
        $responseCategoryAndProductResponse = $this->categoryAndProductBySlugAction
            ->execute(
                new GetCategoryAndProductBySlugRequest($slug)
            );

        return view('shop.show' , [
            'category' => $responseCategoryAndProductResponse->categories()
        ]);
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
