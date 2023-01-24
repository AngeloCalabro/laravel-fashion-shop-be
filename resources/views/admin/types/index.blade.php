@extends('layouts.admin')
@section('content')
    <h1>Categories</h1>
    <div class="text-end">
        <a class="btn btn-success" href="{{ route('admin.types.create') }}">Crea nuovo categoria</a>
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
            @foreach ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>
                        <a href="{{ route('admin.types.show', $type->slug) }}"> {{ $type->name }} </a>
                    </td>

                    <td class="text-end">
                        <a class="link-secondary" href="{{route('admin.types.edit', $type->slug)}}" title="Edit type">
                            <i class="fa-solid fa-pen"></i>
                        </a> 
                    </td>
                    <td class="text-end">
                        <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $type->name }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- {{ $types->links('vendor.pagination.bootstrap-5') }} --}}
    @include('partials.admin.modal-delete')
@endsection
