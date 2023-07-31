<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.sidebar')
    </div>
    <div class="col py-3">
        <div class="container mt-4">
            <div class="row mb-0">
                <div class="col-lg-9 col-xl-6">
                    <h4 class="mb-3">{{ $pageTitle }}</h4>
                </div>
                {{-- <div class="dropdown">

                    <button id="dLabel" type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <div class="row total-header-section">
                            @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['pprice'] * $details['qty'] @endphp
                            @endforeach
                            <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                <p>Total: <span class="text-success">Rp. {{ $total }}</span></p>
                            </div>
                        </div>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="{{ asset('img') }}/{{ $details['pphoto'] }}" />
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>{{ $details['pname'] }}</p>
                                        <span class="price text-success"> Rp.{{ $details['pprice'] }}</span> <span class="count"> Quantity:{{ $details['qty'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <br/>
                <div class="container">
                    @if(session('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
                    @endif
                </div>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach ($drinks as $drink)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $drink->pphoto }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h3 class="card-title">{{ $drink->pname }}</h3>
                            <p class="card-text">{{ $drink->pdesc }}</p>
                            <p class="card-text">Rp.{{ $drink->pprice }}</p>
                            <p class="btn-holder"><a href="{{ route('add_to_cart', $drink->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
=======
{{-- untuk extends tampilan utama pada layout.app --}}
@extends('layouts.app')

{{-- untuk menunjukkan bagian content yang ditampilkan --}}
@section('content')

    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidebar')
        </div>
            <div class="col md-6">
                <div class="container mt-4">
                    <div class="row mb-0">
                        <div class="col-lg-9 col-xl-6">
                            <h4 class="mb-3">{{ $pageTitle }}</h4>
                        </div>
                    </div>
                    <hr>
                        <div class="row">
                            @foreach ($drinks as $drink)
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ $drink->pphoto }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $drink->pname }}</h5>
                                    <p class="card-text">{{ $drink->pprice }}</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
    </div>

>>>>>>> aa8db68c0efc88a675d8113e3d1585b37badc744
@endsection
