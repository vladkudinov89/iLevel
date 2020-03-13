@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">

            <h1>SHOW CATEGORY "{{$category['category_name']}}"</h1>

            <div class="card-columns">
                @forelse ($category['category_products'] as $product)

                    <div class="card" style="width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">Some quick content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                @empty
                    <p>No products</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
