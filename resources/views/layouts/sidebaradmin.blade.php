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
    <div class="row flex-nowrap" style="position: fixed">
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
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transactions.index') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Transaction</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endauth
