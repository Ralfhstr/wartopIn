@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.sidebaradmin')
    </div>
    <div class="col py-3">
        <div class="container mt-4">
            <div class="row mb-0">
                <div class="col-lg-9 col-xl-6">
                    <h4 class="mb-3">{{ $pageTitle }}</h4>
                </div>
            </div>
            <div class="col-lg-3 col-xl-6">
                <ul>
                    <li class="list-inline-item">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Create Product
                        </a>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="row">
                @foreach ($products as $product)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/images/' . $product->pphoto) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $product->pname }}</h5>
                        <p class="card-text">{{ $product->pprice }}</p>
                        <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
