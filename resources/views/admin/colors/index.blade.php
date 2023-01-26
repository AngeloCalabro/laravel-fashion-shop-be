@extends('layouts.admin')
@section('content')

<form action="{{ route('admin.colors.store') }}" method="POST" class="mb-1 pb-1">
    @csrf
    <div class="w-50 d-flex">
        <input type="color" class="form-control w-50 me-3 p-1 @error('hex_value') is-invalid @enderror"
        name="hex_value" required>
        @error('hex_value')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input type="text" class="form-control  @if(count($errors->store_errors)) is-invalid @endif" name="name" id="name" required maxlength="45" placeholder="Aggiungi nome colore...">
    </div>
    <div>
        @if(count($errors->store_errors))
            <div class="invalid-feedback">{{$errors->store_errors->first('name')}}</div>
        @endif
        @if(count($errors->store_errors))
            <div class="invalid-feedback">{{$errors->store_errors->first('hex_value')}}</div>
        @endif
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary" id="btn-submit">Invia</button>
        <button type="reset" class="btn btn-warning text-white" id="btn-reset">Reset</button>
    </div>
</form>

    <h1>Colori</h1>

    @include('partials.admin.error-session')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Color code</th>
                <th scope="col">Count</th>
                <th scope="col" class="text-end">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colors as $color)
                <tr>
                    <th scope="row">{{ $color->id }}</th>

                    <td>
                       <form action="{{route('admin.colors.update', $color->slug)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent text-capitalize @if(count($errors->update_errors)) is-invalid @endif" type="text" name="name" value="{{$color->name}}">
                            @if(count($errors->update_errors))
                                @if(session()->get('color_id') == $color->id)
                                    <div class="invalid-feedback">{{$errors->update_errors->first('name')}}</div>
                                @endif
                            @endif
                        </form>
                    </td>
                    <td style="background-color: {{ $color->hex_value }}">
                        {{ $color->hex_value }}
                    </td>
                    <td class="text-center">
                        {{ count($color->products ) > 0 ? count($color->products) : 0}}
                    </td>

                    <td class="text-end">
                        <form action="{{ route('admin.colors.destroy', $color->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $color->name }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $colors->links('vendor.pagination.bootstrap-5') }}
    @include('partials.admin.modal-delete')
@endsection
