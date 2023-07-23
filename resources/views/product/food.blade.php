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
                            @foreach ($foods as $food)
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ $food->pphoto }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $food->pname }}</h5>
                                    <p class="card-text">{{ $food->pprice }}</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
    </div>

@endsection
