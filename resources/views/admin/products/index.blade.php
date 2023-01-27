@extends('layouts.admin')
@section('content')

    <h1>Products</h1>
    <div class="text-end">
        <a class="btn btn-success" href="{{route('admin.products.create')}}">Crea nuovo prodotto</a>
    </div>

   @include('partials.admin.error-session')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Rating</th>
            <th scope="col">Category</th>
            <th scope="col">Texture</th>
            <th scope="col">Brand</th>
            <th scope="col">Tag</th>
            <th scope="col">Color</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>

                    <td>
                        @if ($product->image)
                            <img class="image-container" src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}">
                        @else
                            <small class="text-secondary">No image</small>
                        @endif
                    </td>

                    <td class="text-capitalize">
                        <a href="{{route('admin.products.show', $product->slug)}}" title="View Product">{{$product->name}}</a>
                    </td>

                    <td>{{Str::limit($product->description,50)}}</td>

                    <td class="text-center">{{$product->price}} {{$product->price_sign}}</td>

                    <td class="text-center">{{$product->quantity}}</td>

                    <td class="text-center">{{$product->rating}}</td>

                    <td class="text-center">
                        @if ($product->type)
                            {{$product->type->name}}
                        @else
                            <small class="text-secondary">Senza categoria</small>
                        @endif
                    </td>

                    <td class="text-center">
                        @if ($product->texture)
                            {{$product->texture->name}}
                        @else
                            <small class="text-secondary">Senza categoria</small>
                        @endif
                    </td>

                    <td class="text-center">
                        @if ($product->brand)
                            {{$product->brand->name}}
                        @else
                            <small class="text-secondary">Senza categoria</small>
                        @endif
                    </td>

                    <td class="text-center">
                        {{count($product->tags) > 0 ? count($product->tags) : 0}}
                    </td>
                    <td class="text-center">
                        {{count($product->colors) > 0 ? count($product->colors) : 0}}
                    </td>

                    <td>
                        <a class="link-secondary" href="{{route('admin.products.edit', $product->slug)}}" title="Edit product">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{route('admin.products.destroy', $product->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$product->name_product}}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                     </form>
                </tr>
        @endforeach

        </tbody>
    </table>
    {{ $products->links('vendor.pagination.bootstrap-5') }}

    @include('partials.admin.modal-delete')
@endsection
