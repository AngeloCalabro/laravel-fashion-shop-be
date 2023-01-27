@extends('layouts.admin')

@section('content')
    <h1>Create Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
        @csrf

            <div class="row bg-white">

                <div class="col-6">

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" value="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price">

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
                        <input type="number" value="0" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity">

                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="tags" class="form-label">Seleziona tag</label><br>
                        @foreach ($tags as $tag)
                            <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                            <span class="text-capitalize">{{$tag->name}}</span>
                        @endforeach

                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="col-6">

                    <div class="mb-3">
                        <label for="rating">Rating</label>
                        <select name="rating" class="form-control @error('rating') is-invalid @enderror">
                                <option value="">Select rating</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>

                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="type_id" class="form-label">Types</label>
                        <select name="type_id" id="type_id" class="form-control">
                            <option class="text-capitalize" value="">Select types</option>
                            @foreach ($types as $type)
                                <option value="{{$type->id}}" class="text-capitalize">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="texture_id" class="form-label">Textures</label>
                        <select name="texture_id" id="texture_id" class="form-control">
                            <option class="text-capitalize" value="">Select textures</option>
                            @foreach ($textures as $texture)
                                <option value="{{$texture->id}}" class="text-capitalize">{{$texture->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Brands</label>
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option class="text-capitalize" value="">Select brands</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" class="text-capitalize">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>

                   <div class="mb-3">
                        <label for="colors" class="form-label">Seleziona colore</label><br>
                        @foreach ($colors as $color)
                            <input type="checkbox" name="colors[]" value="{{$color->id}}">
                            <span class="text-capitalize">{{$color->name}}</span>
                        @endforeach

                        @error('colors')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" name="image" id="create_cover_image" class="form-control  @error('image') is-invalid @enderror">

                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Crea</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>

    {{-- <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
        </script>
        <script type="text/javascript">
          bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script> --}}

@endsection
