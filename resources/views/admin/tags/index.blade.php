@extends('layouts.admin')
@section('content')
    <h1>Tag</h1>
    <div class="text-end">
        <a class="btn btn-success" href="{{ route('admin.tags.create') }}">Crea nuovo brand</a>
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
                <th scope="col">Count</th>
                <th scope="col" class="text-end">Edit</th>
                <th scope="col" class="text-end">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>
                        <a href="{{ route('admin.tags.show', $tag->slug) }}">{{ $tag->name }}</a>
                    </td>

                    <td>
                        {{-- {{count($tag->products)}} --}}
                    </td>

                    <td class="text-end">
                        <a class="link-secondary" href="{{ route('admin.tags.edit', $tag->slug) }}" title="Edit tag">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                    <td class="text-end">
                        <form action="{{ route('admin.tags.destroy', $tag->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $tag->name }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $tags->links('vendor.pagination.bootstrap-5') }}
    @include('partials.admin.modal-delete')
@endsection
