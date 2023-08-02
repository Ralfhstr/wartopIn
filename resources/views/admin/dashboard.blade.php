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
    <div class="col-md-8 my-5">
        <div class="container mt-4">
            <div class="row mb-0">
                <div class="col-lg-9">
                    <h1 class="mb-3">{{ $pageTitle }}</h1>
                </div>
                <div class="col-lg-3">
                    <ul class="list-inline mb-0 float-end">
                        <li class="list-inline-item">
                            <a href="{{ route('transactions.exportExcel') }}" class="btn btn-outline-success">
                                <i class="bi bi-download me-1"></i> to Excel
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('transactions.exportPdf') }}" class="btn btn-outline-danger">
                                <i class="bi bi-download me-1"></i> to PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="table-responsive border p-3 rounded-3 table-container">
                <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="transactionTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No.</th>
                            <th>User Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
