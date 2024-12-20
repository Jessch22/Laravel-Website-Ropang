@php
use Illuminate\Support\Facades\Auth;
@endphp

<nav id="navmenu" class="navmenu">
  <ul>
    <li><a href="#hero" class="active">Home<br></a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#menu">Menu</a></li>
    <li><a href="#book-a-table">Book A Table</a></li>
    <li><a href="#contact">Contact</a></li>

    <li>
      <a href="/cart" class="cart-icon">
        <i class="fa fa-shopping-cart"></i>
      </a>
    </li>
  </ul>
  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

@guest
  <a class="btn-book-a-table d-none d-xl-block" href="{{ route('login') }}">Login</a>
@else
  <div class="dropdown">
    <a class="btn-book-a-table d-none d-xl-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
      {{ Auth::user()->name }}
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      @if(Auth::user()->role == 'admin' || Auth::user()->role == 'owner')
        <li><a class="dropdown-item" href="{{ route('screens.admindashboard') }}">Go to Admin Page</a></li>
      @else
        <li><a class="dropdown-item" href="#">Profile</a></li>
      @endif
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="dropdown-item">Logout</button>
        </form>
      </li>
    </ul>
  </div>
@endguest
