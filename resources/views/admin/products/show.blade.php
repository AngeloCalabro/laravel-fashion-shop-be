@extends('layouts.admin')
@section('content')
   <h1>{{ $product->name }}</h1>
    <div class="show-contain overflow-scroll">
        <p>{{ $product->description }}</p>
        <img src="{{  $product->image_link }}">


    </div>

@endsection


