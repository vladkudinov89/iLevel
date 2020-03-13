@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif



    <div class="container">

        <h1 class="text-center">SHOP</h1>

        <ul class="nav justify-content-center mb-5">
            @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link active"
                       href="{{route('shop.show' , $category['category_slug'])}}">
                        {{$category['category_name']}} ( {{$category['category_products']}} )
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="row justify-content-center">


            <div class="card-columns">
            @forelse ($products as $product)
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">{{$product['product_name']}}</h5>
                        <p class="card-text">Some quick content.</p>

                        <p>Categories:
                        @foreach($product['product_category'] as $pr_category)
                            <a href="{{route('shop.show' , $pr_category['slug'])}}" class="">
                                {{$pr_category['name']}}
                            </a>
                        @endforeach
                        </p>
                        <a href="#" class="btn btn-primary">Show</a>


                    </div>
                </div>
            @empty
                <p>No products</p>
            @endforelse
        </div>
        </div>
    </div>

@endsection
