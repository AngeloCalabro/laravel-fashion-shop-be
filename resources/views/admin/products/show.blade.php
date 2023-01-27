@extends('layouts.admin')

@section('content')
    <section class="container my-5" id="show">
        <h1 class="mb-5">Show Product: {{$product->name}}</h1>
        <div class="row">
            <div class="img-box col-12 col-lg-4 col-md-6 me-5">
                @if($product->image)
                    <img class="shadow" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @else
                    <img class="shadow" src="https://dummyimage.com/1200x840/000/fff" alt="C/O https://dummyimage.com/">
                @endif
            </div>
            <div class="col-12 col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <div class="mb-2">
                                    <span class="fw-bold">Nome:</span> {{$product->name}}
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Prezzo:</span> {{$product->price_sign}}{{$product->price}}
                                </div>
                                <div class="mb-2 text-capitalize">
                                    @if($product->rating)
                                        <span class="fw-bold">Rating:</span> {{$product->rating}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-12">
                                <div class="mb-2 text-capitalize">
                                    @if($product->type)
                                    <span class="fw-bold">Tipo:</span> {{$product->type->name}}
                                    @endif
                                </div>
                                <div class="mb-2 text-capitalize">
                                    @if($product->texture)
                                    <span class="fw-bold">Texture:</span> {{$product->texture->name}}
                                    @endif
                                </div>
                                <div class="mb-2 text-capitalize">
                                    @if($product->brand)
                                    <span class="fw-bold">Brand:</span> {{$product->brand->name}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-2 text-capitalize row">
                            @if (count($product->tags))
                                <span class="fw-bold">Tags:</span>
                                <ul class="col-6 col-md-6 col-sm-4">
                                    @foreach ($product->tags as $tag)
                                        <li>{{ $tag->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <span class="fw-bold">Descrizione:</span>
            <div class="mt-2">
                {{$product->description}}
            </div>
        </div>
    </section>
@endsection
