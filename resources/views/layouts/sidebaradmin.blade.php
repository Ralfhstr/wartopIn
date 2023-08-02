{{-- Hover --}}
<style>
    .nav-link:hover h1, .nav-link:hover h3 {
        color: white; /* Ganti dengan warna teks yang diinginkan saat di-hover */
    }
    .font {
        color:#FFF500
    }
</style>

{{-- Side Nav --}}
@auth
<div class="container-fluid sidebar">
    <div class="row flex-nowrap" style="position: fixed;">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color:  #0D0C0F; width: 240px;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="navbar-nav">
                    <img src="{{ asset('storage/images/profile.png') }}" alt="hugenerd" width="130" height="130" class="rounded-circle mx-3 my-3">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <span style="width: 50px"></span>
                        <h5 class="mb-0 mr-2 font align-text-center">{{ Auth::user()->name }}</h5>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="bi bi-lock"></i>{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <hr>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="{{ route('transactions.gProducts') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="fa-solid fa-utensils font px-1"></i></h1>
                            <span class="ms-1 d-none d-sm-inline font"><h3 class="mb-0">Product</h3></span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('transactions.index') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="fa-solid fa-money-check-dollar font"></i></h1>
                            <span class="ms-1 d-none d-sm-inline font"><h3 class="mb-0">Transactions</h3></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endauth
