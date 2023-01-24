@extends('layouts.admin')
@section('content')
<h1>Add  a new Brand</h1>
<div class="row bg-white">
<div class="col-12">
    <form action="{{route('admin.brands.store')}}" method="POST" class="p-4">
    @csrf
    <div class="mb-3">
        <label for="name" class="from-label">inserisci un nuovo brand </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" 
        name="name">
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