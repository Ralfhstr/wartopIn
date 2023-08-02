@extends('layouts.app')

@section('content')
<style>
    .font {
        color:#FFF500
    }
</style>
<div class="row">
    <div class="col-md-3">
        @include('layouts.sidebar')
    </div>
    <div class="col py-3">
        <div class="container mt-4">
            <div class="row mb-0">
                <div class="col-lg-9 col-xl-6">
                    <h4 class="mb-3 font">{{ $pageTitle }}</h4>
                </div>
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
                @foreach ($foods as $food)
                    <div class="card align-items-center" style="width: 18rem; border-radius:30px;margin: 0 30px">
                        <img src="{{ asset('storage/images/' . $food->pphoto) }}" class="rounded-circle mx-3 my-3" alt="..." width="80%">
                        <div class="card-body text-center">
                        <h3 class="card-title">{{ $food->pname }}</h3>
                        <h4 class="card-text">Rp.{{ $food->pprice }}</h4>
                        <p class="btn-holder my-3"><a href="{{ route('add_to_cart', $food->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
