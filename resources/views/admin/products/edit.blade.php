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
            
             
             <div class="row bg-white">
         <div class="col-12">
             <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" enctype="multipart/form-data"
                 class="p-4">
                 @csrf
                 @method('PUT')
                 <div class="mb-3">
                     <label for="name" class="form-label">Product Name</label>
                     <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                         name="name" value="{{ old('name', $product->name) }}">
                     @error('title')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label for="descritpion" class="form-label">Descritpion</label>
                     <textarea class="form-control" id="descritpion" name="descritpion">{{ old('descritpion', $product->description) }}</textarea>
                 </div>
                 {{-- <div class="mb-3">
                     <label for="dev_lang" class="form-label">Used Dev Languages</label>
                     <input type="text" class="form-control @error('dev_lang') is-invalid @enderror" id="dev_lang"
                         name="dev_lang" value="{{ old('dev_lang', $product->dev_lang) }}">
                     @error('dev_lang')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div> --}}
                 <div class="mb-3">
                     <label for="framework" class="form-label">Price</label>
                     <input type="number" class="form-control @error('framework') is-invalid @enderror" id="framework"
                         name="framework" value="{{ old('framework', $product->framework) }}">
                     @error('framework')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label for="team" class="form-label">Quantity</label>
                     <input type="number" class="form-control @error('team') is-invalid @enderror" id="team"
                         name="team" value="{{ old('team"', $product->team) }}">
                     @error('team')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label for="git_link" class="form-label">GitHub Link</label>
                     <input type="text" class="form-control @error('git_link') is-invalid @enderror" id="git_link"
                         name="git_link" value="{{ old('git_link', $product->git_link) }}">
                     @error('git_link')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
                 <div>
                     <label for="diff_lvl">Rating (da 1 a 10)</label>
                     <select name="diff_lvl" class="form-control @error('diff_lvl') is-invalid @enderror">
                         <option value="0" {{ old('diff_lvl', $product->diff_lvl == '0' ? 'selected' : '') }}>0
                         </option>
                         <option value="1" {{ old('diff_lvl', $product->diff_lvl == '1' ? 'selected' : '') }}>1
                         </option>
                         <option value="2" {{ old('diff_lvl', $product->diff_lvl == '2' ? 'selected' : '') }}>2
                         </option>
                         <option value="3" {{ old('diff_lvl', $product->diff_lvl == '3' ? 'selected' : '') }}>3
                         </option>
                         <option value="4" {{ old('diff_lvl', $product->diff_lvl == '4' ? 'selected' : '') }}>4
                         </option>
                         <option value="5" {{ old('diff_lvl', $product->diff_lvl == '5' ? 'selected' : '') }}>5
                         </option>
                         <option value="6" {{ old('diff_lvl', $product->diff_lvl == '6' ? 'selected' : '') }}>6
                         </option>
                         <option value="7" {{ old('diff_lvl', $product->diff_lvl == '7' ? 'selected' : '') }}>7
                         </option>
                         <option value="8" {{ old('diff_lvl', $product->diff_lvl == '8' ? 'selected' : '') }}>8
                         </option>
                         <option value="9" {{ old('diff_lvl', $product->diff_lvl == '9' ? 'selected' : '') }}>9
                         </option>
                         <option value="10" {{ old('diff_lvl', $product->diff_lvl == '10' ? 'selected' : '') }}>10
                         </option>
                     </select>
                     @error('diff_lvl')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="d-flex">
                     <div class="media me-4">
                         <img class="shadow" width="150" src="{{ asset('storage/' . $product->cover_image) }}"
                             alt="{{ $product->name }}">
                     </div>
                     <div class="mb-3">
                         <label for="cover_image" class="form-label">Replace product image</label>
                         <input type="file" name="cover_image" id="cover_image"
                             class="form-control  @error('cover_image') is-invalid @enderror">
                         @error('cover_image')
                             <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                     </div>
                 </div>
                 {{-- workflow type --}}
                 <div class="mb-3">
                     <label for="type_id" class="form-label">Seleziona tipologia di prodotto</label>
                     <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                         <option value="">Seleziona tipologia di prodotto</option>
                         @foreach ($types as $type)
                             <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                                 {{ $type->workflow }}</option>
                         @endforeach
                     </select>
                     @error('type_id')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>

       
                 <button type="submit" class="btn btn-success">Submit</button>
                 <button type="reset" class="btn btn-primary">Reset</button>
             </form>
         </div>
             </div>
     </div>
@endsection
