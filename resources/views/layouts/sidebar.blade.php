{{-- Hover --}}
<style>
    .nav-link:hover h1, .nav-link:hover h3 {
        color: white; /* Ganti dengan warna teks yang diinginkan saat di-hover */
    }
    body{
        background-color: black
    }
    .font {
        color:#FFF500
    }
</style>

{{-- Side Nav --}}
@auth
<div class="container-fluid sidebar">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color:  #0D0C0F; width: 240px;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="navbar-nav">
                    <img src="{{ asset('storage/images/profile.png') }}" alt="hugenerd" width="130" height="130" class="rounded-circle mx-3 my-3">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <span style="width: 60px"></span>
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
                        <a href="{{ route('products.food') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="fa-solid fa-utensils font px-1"></i></h1>
                            <span class="ms-1 d-none d-sm-inline font"><h3 class="mb-0">Food</h3></span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('products.drink') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="fa-solid fa-mug-hot font px-1"></i></h1>
                            <span class="ms-1 d-none d-sm-inline font"><h3 class="mb-0">Drink</h3></span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('products.snack') }}" class="d-flex align-items-center nav-link">
                            <h1><i class="fa-solid fa-burger font px-1"></i></h1>
                            <span class="ms-1 d-none d-sm-inline font"><h3 class="mb-0">Snack</h3></span>
                        </a>
                    </li>
                </ul>
                <div>
                    <div class="d-flex align-items-center nav-link" data-bs-toggle="modal" data-bs-target="#cartModal">
                        <h1><i class="bi bi-basket2-fill font px-2"></i></h1>
                        <span class="ms-1 d-none d-sm-inline font"><h3 class="mb-0">Cart</h3></span>
                        <h5><span class="badge bg-warning">{{ count((array) session('cart')) }}</span></h5>
                    </div>
                </div>
                <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-success" id="cartModalLabel">Detail Cart</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{ asset('storage/images/' . $details['pphoto']) }}" width="100%"/>
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <h4 class="font-weight-normal text-dark">{{ $details['pname'] }}</h4>
                                                <span class="count text-success">{{ $details['qty'] }}x</span>
                                                <b><span class="count font-weight-bold text-success"> Rp.{{ $details['pprice'] }}</span></b>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-block">Check Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
