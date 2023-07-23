{{-- Hover --}}
<style>
    .nav-link:hover {
        background-color: #e44949; /* Ganti dengan warna latar belakang yang diinginkan saat di-hover */
    }

    .nav-link:hover h1, .nav-link:hover h3 {
        color: #ff953c; /* Ganti dengan warna teks yang diinginkan saat di-hover */
    }
</style>

{{-- Side Nav --}}
@auth
<div class="container-fluid sidebar">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #e44949; width: 240px;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="navbar-nav">
                    <img src="profile.png" alt="hugenerd" width="130" height="130" class="rounded-circle mx-3 my-3">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <h5 class="mb-0 mr-2 text-dark align-text-center">{{ Auth::user()->name }}</h5>
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
                    {{-- <li class="nav-item">
                        <a href="{{ route('home') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="bi bi-house-door-fill text-dark px-1"></i></h1>
                            <span class="ms-1 d-none d-sm-inline text-white"><h3 class="mb-0">Home</h3></span>
                        </a>
                    </li>
                    <hr> --}}
                    <li>
                        <a href="{{ route('products.food') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="fa-solid fa-utensils text-dark px-1"></i></h1>
                            <span class="ms-1 d-none d-sm-inline text-white"><h3 class="mb-0">Food</h3></span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('products.drink') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="fa-solid fa-mug-hot text-dark px-1"></i></h1>
                            <span class="ms-1 d-none d-sm-inline text-white"><h3 class="mb-0">Drink</h3></span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('products.snack') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="fa-solid fa-burger text-dark px-1"></i></h1>
                            <span class="ms-1 d-none d-sm-inline text-white"><h3 class="mb-0">Snack</h3></span>
                        </a>
                    </li>
                </ul>
                <hr>
                {{-- <div class="dropdown pb-4">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <div class="d-flex align-items-center nav-link">
                                <h1><i class="bi bi-basket2-fill text-dark px-2"></i></h1>
                                <span class="ms-1 d-none d-sm-inline text-white"><h3 class="mb-0">Cart</h3></span>
                            </div>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endauth
