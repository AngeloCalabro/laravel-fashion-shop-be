@extends('layouts.admin')
@section('content')
<h1> Edit a Texture {{$texture->name}}</h1>

<div class="row bg-white">
<div class="col-12">
    <form action="{{route('admin.textures.update', $texture->slug)}}" method="POST" class="p-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="from-label">inserisci modifiche  texture </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" 
        name="name" value="{{ old('brands', $texture->name) }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
       
    </div>
    
    
    </form>
</div>
</div>
    
@endsection