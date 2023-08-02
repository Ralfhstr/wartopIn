@extends('layouts.app')

@section('content')
<style>
    .font {
        color:#FFF500
    }
</style>
<div class="row">
    <div class="col-md-3">
        @include('layouts.sidebaradmin')
    </div>
    <div class="col py-3">
        <div class="container mt-4">
            <div class="row mb-0">
                <div class="col-lg-9 col-xl-6">
                    <h1 class="mb-3">{{ $pageTitle }}</h1>
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
                    <div class="card datatable align-items-center" style="width: 18rem; border-radius:30px;margin: 0 30px">
                        <img src="{{ asset('storage/images/' . $product->pphoto) }}" class="rounded-circle mx-3 my-3" alt="..." width="80%">
                        <div class="card-body text-center">
                        <h3 class="card-title">{{ $product->pname }}</h3>
                        <h4 class="card-text">Rp.{{ $product->pprice }}</h4>
                        <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                        <div>
                            <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete" data-name="{{ $product->pname }}">
                                    <i class="bi-trash"></i>
                                </button>
                            </form>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
