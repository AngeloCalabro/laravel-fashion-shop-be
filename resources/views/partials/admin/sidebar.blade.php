<nav id="sidebarMenu" class="bg-dark navbar-dark">
        <a href="/" class="nav-link text-white" >
            <h2 class="p-2"><i class="fa-solid fa-square-rss"></i> Fashion Pisa</h2>
        </a>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}" href="{{route('admin.dashboard')}}">
                <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.products.index' ? 'bg-secondary' : '' }}" href="{{route('admin.products.index')}}">
                    <i class="fa-solid fa-newspaper fa-lg fa-fw"></i> Products
                </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-secondary' : '' }}" href="{{route('admin.types.index')}}">
                        <i class="fa-solid fa-folder-open fa-lg fa-fw"></i> Types
                    </a>
                </li>
                <li>
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.textures.index' ? 'bg-secondary' : '' }}" href="{{route('admin.textures.index')}}">
                    <i class="fa-solid fa-bookmark fa-lg fa-fw"></i> Textures
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.brands.index' ? 'bg-secondary' : '' }}" href="{{route('admin.brands.index')}}">
                        <i class="fa-solid fa-users fa-lg fa-fw"></i> Brands
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.colors.index' ? 'bg-secondary' : '' }}" href="{{route('admin.colors.index')}}">
                        <i class="fa-solid fa-palette fa-lg fa-fw"></i> Colori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.tags.index' ? 'bg-secondary' : '' }}" href="{{route('admin.tags.index')}}">
                        <i class="fa-solid fa-tags fa-lg fa-fw"></i> Tags

                    </a>
                </li>
        </ul>
    </nav>
