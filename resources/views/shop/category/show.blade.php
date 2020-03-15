@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

            <h1 class="text-center">SHOW CATEGORY "{{$category['category_name']}}"</h1>
        <div class="row justify-content-center">

            <div class="d-flex ">
                <div class="form-group mr-2">

                    <div class="pull-left">
                        <a href="{{route('shop.category.edit' , $category['category_slug'])}}" class="btn btn-success btn-md">Update Category</a>
                    </div>

                </div>

                <div class="form-group">

                    <div class="pull-left">
                        <a href="{{route('shop.category.update' , $category['category_slug'])}}" class="btn btn-danger btn-md">Delete Category</a>
                    </div>

                </div>
            </div>

            <div class="card-columns">
                @forelse ($category['category_products'] as $product)

                    <div class="card" style="width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">Some quick content.</p>
                            <a href="{{route('shop.product.show' , $product['slug'])}}" class="btn btn-primary">Show Product</a>
                        </div>
                    </div>
                @empty
                    <p>No products</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
