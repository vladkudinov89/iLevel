@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="mb-4 mt-4">Edit "{{$product['product_name']}}" Product</h2>

        <form class="form-horizontal" action="{{route('shop.product.update' , $product['product_slug'])}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{--Form include--}}
            @include('shop.product.partials.form')


        </form>
    </div>
@endsection
