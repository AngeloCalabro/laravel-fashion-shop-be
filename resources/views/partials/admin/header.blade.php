<header class="text-end m-3">
        <div id="main-menu text-end dropdown-menu-left">
            <nav class="navbar-nav container navbar-light nav-dashboard">
                    <ul class="navbar-nav pull-right">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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