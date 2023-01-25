@extends('layouts.admin')
@section('content')
<h1>Add a new Color</h1>
<div class="row bg-white">
<div class="col-6">
    <form action="{{route('admin.colors.store')}}" method="POST" class="p-4">
    @csrf
    <div class="mb-3">
        <label for="name" class="from-label">Inserisci un nuovo colore </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
        name="name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    {{-- hex_value --}}
    <div class="mb-3">
        <label for="hex_value" class="from-label">Inserisci un nuovo colore </label>
        <input type="color" class="form-control w-25 color-pick @error('hex_value') is-invalid @enderror"
        name="hex_value">
        @error('hex_value')
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
