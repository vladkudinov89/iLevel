@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="mb-4 mt-4">Edit "{{$category['category_name']}}" Category</h2>

        <form class="form-horizontal" action="{{route('shop.category.update' , $category['category_slug'])}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{--Form include--}}
            @include('shop.category.partials.form')


        </form>
    </div>
@endsection
