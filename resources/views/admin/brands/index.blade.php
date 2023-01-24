@extends('layouts.admin')
@section('content')
    <h1>Brands</h1>
    <div class="text-end">
        <a class="btn btn-success" href="{{ route('admin.brands.create') }}">Crea nuovo brand</a>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-end">Edit</th>
                <th scope="col" class="text-end">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <th scope="row">{{ $brand->id }}</th>
                    <td>
                        {{-- <a href="{{route('admin.brands.show , $brand->slug')}}">{{$brand->name}}</a> --}}
                        <a href="{{ route('admin.brands.show', $brand->slug) }}">{{ $brand->name }}</a>
                    </td>

                    <td class="text-end">
                        <a class="link-secondary" href="{{ route('admin.brands.edit', $brand->slug) }}" title="Edit brand">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                    <td class="text-end">
                        <form action="{{ route('admin.brands.destroy', $brand->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $brand->name }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- {{ $brands->links('vendor.pagination.bootstrap-5') }} --}}
    @include('partials.admin.modal-delete')
@endsection
