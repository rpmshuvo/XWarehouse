<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand nav-link" href="{{ url('/home') }}">
      {{ config('APP.name', 'XWarehouse') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->

      <ul class="navbar-nav mr-auto ">
        <li class="nav-item ">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/categories">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/invoices">Invoices</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/returninfos">Return Infos</a>
        </li>
        @role('admin')
        <li class="nav-item">
          <a class="nav-link" href="/employees">Employees</a>
        </li>
        @endrole
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
          </li>
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/home">Dashboard</a>
              <a class="dropdown-item" href="/home">Login as :{{Auth::user()->roles->pluck('name')}}</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </div>
</nav>
