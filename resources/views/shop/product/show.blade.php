@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="text-center">SHOW Product</h1>

        <ul class="nav justify-content-center mb-3">
            @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link active"
                       href="{{route('shop.category.show' , $category['slug'])}}">
                        {{$category['name']}}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="row justify-content-center">

            <div class="card-columns">


                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">{{$product['product_name']}}</h5>
                        <p class="card-text">Some quick content.</p>
                        <a href="{{route('shop.product.edit' , $product['product_slug'])}}"
                           class="btn btn-primary">
                            Edit Product</a>
                        <form action="{{ route('shop.product.destroy',$product['product_id']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button class="btn btn-danger" type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
