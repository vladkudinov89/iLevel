@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="mb-4 mt-4">Add Category</h2>

        <form class="form-horizontal" action="{{route('shop.store.category')}}" method="post">

            {{csrf_field()}}

            {{--Form include--}}
            @include('shop.category.partials.form')


        </form>
    </div>
@endsection
