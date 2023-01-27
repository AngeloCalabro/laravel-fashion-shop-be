@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="text-center">
            <img src="{{url('/logo-app-black.png')}}" alt="Image" width="200px" />
            </div>
                <div class="card-header">
                    <p>Benvenuto <span class="text-capitalize">{{ Auth::user()->name }} </span></p>
                    <p>Questa è la tua {{ __('dashboard') }}</p></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">

                        {{ session('status')}}
                    </div>
                    @endif

                    {{__('Hai effettuato correttamente la login, ora sei pronto per gestire il tuo store') }}
                </div>

                <div>
                <ul class="flex-column dashboard-list">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? '' : '' }}" href="{{route('admin.dashboard')}}">
                <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                </a>
            </li>
                <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.products.index' ? '' : '' }}" href="{{route('admin.products.index')}}">
                    <i class="fa-solid fa-newspaper fa-lg fa-fw"></i> Products
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.types.index' ? '' : '' }}" href="{{route('admin.types.index')}}">
                        <i class="fa-solid fa-folder-open fa-lg fa-fw"></i> Types
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.textures.index' ? '' : '' }}" href="{{route('admin.textures.index')}}">
                    <i class="fa-solid fa-bookmark fa-lg fa-fw"></i> Textures
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.brands.index' ? '' : '' }}" href="{{route('admin.brands.index')}}">
                        <i class="fa-solid fa-users fa-lg fa-fw"></i> Brands
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.colors.index' ? '' : '' }}" href="{{route('admin.colors.index')}}">
                        <i class="fa-solid fa-palette fa-lg fa-fw"></i> Colori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.tags.index' ? '' : '' }}" href="{{route('admin.tags.index')}}">
                        <i class="fa-solid fa-tags fa-lg fa-fw"></i> Tags

                    </a>
                </li>
                </ul>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
