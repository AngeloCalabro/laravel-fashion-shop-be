@extends('layouts.admin')
@section('content')
    <h1>Tags</h1>
    <div class="text-end">
        {{-- <a class="btn btn-success" href="{{ route('admin.tags.create') }}">Crea nuovo tag</a> --}}
        <a class="btn btn-success" href="">Crea nuovo tag</a>
    </div>

    @include('partials.admin.error-session')

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
                    <td class="text-capitalize">
                        <a href="#">{{ $tag->name }}</a>
                    </td>

                    <td>
                        {{count($tag->products) > 0 ? count($tag->products) : 0}}
                    </td>

                    <td class="text-end">
                        {{-- <a class="link-secondary" href="{{ route('admin.tags.edit', $tag->slug) }}" title="Edit tag">
                            <i class="fa-solid fa-pen"></i>
                        </a> --}}
                        <a class="link-secondary" href="" title="Edit tag">
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
