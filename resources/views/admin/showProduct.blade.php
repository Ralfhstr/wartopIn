@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.sidebaradmin')
    </div>
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <h4>Detail Product</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="pname" class="form-label">Product Name</label>
                        <h5>{{ $product->pname }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="pdesc" class="form-label">Product Description</label>
                        <h5>{{ $product->pdesc }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="pphoto" class="form-label">Photo</label>
                        <img src="{{ asset('storage/images/' . $product->pphoto) }}" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="pprice" class="form-label">Price</label>
                        <h5>{{ $product->pprice }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="tyname" class="form-label">Type</label>
                        <h5>{{ $product->type->tyname }}</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
