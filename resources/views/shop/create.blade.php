@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="mb-4 mt-4">Add Category</h2>

        <form class="form-horizontal" action="{{route('shop.store')}}" method="post">

            {{csrf_field()}}

            {{--Form include--}}
            @include('shop.partials.form')


        </form>
    </div>
@endsection
