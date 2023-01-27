    <header>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white">
        <!-- Container wrapper -->
        <div class="container-fluid">
          <!-- Toggle button -->
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>

          <!-- Right links -->
          <ul class="navbar-nav ms-auto d-flex flex-row">
          <div id="main-menu text-end dropdown-menu-left">
            <nav class="navbar-nav container navbar-light nav-dashboard">
                <ul class="navbar-nav pull-right">
                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <img src="{{url('/logo-out-icon.png')}}"  height="22" alt="Avatar" /> {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        {{-- <div class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0" href="#" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>

        </div> --}}

        <!-- Notification dropdown -->

        <div id="main-menu text-end dropdown-menu-left">
            <nav class="navbar-nav container navbar-light nav-dashboard">
                <ul class="navbar-nav pull-right">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{url('/github-avatar.png')}}" class="rounded-circle" height="22" alt="Avatar" />
                        {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Effettua il logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>


</header>
