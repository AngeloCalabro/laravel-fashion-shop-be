@extends('layouts.admin')
@section('content')

    <h1>Products</h1>
    <div class="text-end">
        <a class="btn btn-success" href="{{route('admin.products.create')}}">Crea nuovo prodotto</a>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
<div class="table-wrapper  overflow-auto">
    
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Texture</th>
                <th scope="col">Brand</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>
                            <a href="{{route('admin.products.show', $product->slug)}}" title="View Product">{{$product->name}}</a>
                        </td>
    
                        <td><img src="{{ asset('storage/' .$product->api_featured_images) }}" alt="{{$product->name}}"></td>
    
                        <td>{{Str::limit($product->description,50)}}</td>
                        <td>{{$product->price}} {{$product->price_sign}}</td>
                        <td>{{$product->type ? $product->type->name : 'Senza categoria'}}</td>
                        <td>{{$product->texture ? $product->texture->name : 'Senza texture'}}</td>
                        <td>{{$product->brand ? $product->brand->name : 'Senza brand'}}</td>
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
</div>
    {{-- {{ $products->links('vendor.pagination.bootstrap-5') }} --}}
    @include('partials.admin.modal-delete')
@endsection
