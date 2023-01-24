@extends('layouts.admin')

@section('content')
    {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div> --}}

        <h1>Edit Product: {{ $product->name }}</h1>
     <div class="edit-contain overflow-scroll">

        <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            @method('PUT')

                <div class="row bg-white">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $product->name)}}">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description">{{old('description', $product->description)}}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price', $product->price)}}">

                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                        <label for="price_sign" class="form-label">Price Sign</label>
                        <select name="price_sign" id="price_sign" class="form-control" required>
                            <option class="text-capitalize" default value="$">$</option>
                            <option class="text-capitalize" value="€">€</option>
                        </select>
                    </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{old('quantity', $product->quantity)}}">

                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="rating">Rating</label>
                            <select name="rating" class="form-control @error('rating') is-invalid @enderror">
                                <option class="text-capitalize" value="">Select rating</option>
                                @for ($i = 1; $i < 11; $i++)
                                    <option value="{{$i}}" {{ $i == old('rating', $i) ? 'selected' : '' }} class="text-capitalize">{{$i}}</option>
                                @endfor
                            </select>

                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Immagine</label>
                            <input type="file" name="image" id="image"
                                class="form-control  @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type_id" class="form-label">Types</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option class="text-capitalize" value="">Select types</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" {{ $type->id == old('type_id', $product->type_id) ? 'selected' : '' }} class="text-capitalize">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="texture_id" class="form-label">Textures</label>
                            <select name="texture_id" id="texture_id" class="form-control">
                                <option class="text-capitalize" value="">Select textures</option>
                                @foreach ($textures as $texture)
                                    <option value="{{$texture->id}}" {{ $texture->id == old('texture_id', $product->texture_id) ? 'selected' : '' }} class="text-capitalize">{{$texture->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="brand_id" class="form-label">Brands</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option class="text-capitalize" value="">Select brands</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{ $brand->id == old('brand_id', $product->brand_id) ? 'selected' : '' }} class="text-capitalize">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Modifica</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>

        </form>

        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
        </script>
        <script type="text/javascript">
          bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

@endsection
