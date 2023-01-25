@extends('layouts.admin')
@section('content')
<h1> Edit a color {{$color->name}}</h1>

<div class="row bg-white">
<div class="col-6">
    <form action="{{route('admin.colors.update', $color->slug)}}" method="POST" class="p-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="from-label">Inserisci modifiche colore </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
        name="name" value="{{ old('colors', $color->name) }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="hex_value" class="from-label">Inserisci modifiche colore </label>
        <input type="color" class="form-control @error('name') is-invalid @enderror"
        name="hex_value" value="{{ old('colors', $color->hex_value) }}">
        @error('hex_value')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <a href="{{route('admin.colors.index')}}">

        </a>
    </div>


    </form>
</div>
</div>

@endsection
