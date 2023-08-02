@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='row'>
            <h1>Laravel 10 Shopping Cart add to cart with Stripe Payment Gateway</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                    Cancel
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
