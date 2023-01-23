@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
               
                <div class="mb-3">
                    <label for="framework" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control @error('framework') is-invalid @enderror" id="framework"
                        name="framework">
                </div>
                <div class="mb-3">
                    <label for="team" class="form-label">Quantity</label>
                    <input type="number" class="form-control @error('team') is-invalid @enderror" id="team"
                        name="team">
                </div>
                
                <div>
                    <label for="diff_lvl">Rating</label>
                    <select name="diff_lvl" class="form-control @error('diff_lvl') is-invalid @enderror">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>

                    @error('diff_lvl')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control  @error('cover_image') is-invalid @enderror">
                    @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- workflow type --}}
              
<br>

                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
