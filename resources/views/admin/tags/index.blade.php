@extends('layouts.admin')
@section('content')

    <form action="{{ route('admin.tags.store') }}" method="POST" class="mb-1 pb-1">
        @csrf
        <div class="w-50">
            <input type="text" class="form-control @if(count($errors->store_errors)) is-invalid @endif" name="name" id="name" required maxlength="45" placeholder="Aggiungi un tag...">
            @if(count($errors->store_errors))
                <div class="invalid-feedback">{{$errors->store_errors->first('name')}}</div>
            @endif
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary" id="btn-submit">Invia</button>
            <button type="reset" class="btn btn-warning text-white" id="btn-reset">Reset</button>
        </div>
    </form>

    <h1>Tags</h1>

    @include('partials.admin.error-session')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Count</th>
                <th scope="col" class="text-end">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>
                       <form action="{{route('admin.tags.update', $tag->slug)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent text-capitalize @if(count($errors->update_errors)) is-invalid @endif" type="text" name="name" value="{{$tag->name}}">
                            @if(count($errors->update_errors))
                                @if(session()->get('tag_id') == $tag->id)
                                    <div class="invalid-feedback">{{$errors->update_errors->first('name')}}</div>
                                @endif
                            @endif
                        </form>
                    </td>

                    <td>
                        {{count($tag->products) > 0 ? count($tag->products) : 0}}
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
