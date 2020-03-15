@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="mb-4 mt-4">Add Product</h2>

        <form class="form-horizontal" action="{{route('shop.store.product')}}" method="post">

            {{csrf_field()}}

            {{--Form include--}}
            @include('shop.product.partials.form')


        </form>
    </div>
@endsection
