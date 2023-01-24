@extends('layouts.admin')
@section('content')

   <h1>{{ $product->name }}</h1>
    <div class="show-contain overflow-scroll">
        <p>{{ $product->description }}</p>
        <img src="{{  $product->image_link }}">
        <p>Price: {{$product->price}}{{$product->price_sign}}</p>
        <p>Quantity: {{$product->quantity}}</p>
        <p>Rating: {{$product->rating}}</p>
        <p>Type: {{$product->type->name}}</p>
        <p>Brand: {{$product->brand->name}}</p>
        <p>Texture: {{$product->texture->name}}</p>
    </div>

@endsection


