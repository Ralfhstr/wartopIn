@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.sidebaradmin')
    </div>
    <div class="container-sm my-5">
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        {{-- <i class="bi-person-circle fs-1"></i> --}}
                        <h4>Edit Product</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pName" class="form-label">Product Name</label>
                            <input class="form-control @error('pName') is-invalid @enderror" type="text" name="pName" id="pName" value="{{ $errors->any() ? old('pName') : $product->pname }}" placeholder="Enter Product Name">
                            @error('pName')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pDesc" class="form-label">Product Description</label>
                            <input class="form-control @error('pDesc') is-invalid @enderror" type="text" name="pDesc" id="pDesc" value="{{ $errors->any() ? old('pDesc') : $product->pdesc }}" placeholder="Enter Description">
                            @error('pDesc')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pPrice" class="form-label">Product Price</label>
                            <input class="form-control @error('pPrice') is-invalid @enderror" type="text" name="pPrice" id="pPrice" value="{{ $errors->any() ? old('pPrice') : $product->pprice }}" placeholder="Enter Product Price">
                            @error('pPrice')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pPhoto" class="form-label">Photo</label>
                            <input class="form-control @error('pPhoto') is-invalid @enderror" type="file" name="pPhoto" id="pPhoto" value="{{ $errors->any() ? old('pPhoto') : $product->pphoto }}" placeholder="Enter pPhoto">
                            @error('pPhoto')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-select">
                                @php
                                    $selected = "";
                                    if ($errors->any())
                                        $selected = old('type');
                                    else
                                        $selected = $product->type_id;
                                @endphp
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ $selected == $type->id ? 'selected' : '' }}>{{ $type->tyname}}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('transactions.gProducts') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


