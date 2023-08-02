@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.sidebaradmin')
    </div>
    <div class="container-sm my-5">
        <form action="{{ route('transactions.update', ['transaction' => $transaction->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <h4>Edit Status</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                @php
                                    $selected = "";
                                    if ($errors->any())
                                        $selected = old('status');
                                    else
                                        $selected = $transaction->status_id;
                                @endphp
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $selected == $status->id ? 'selected' : '' }}>{{ $status->stname}}</option>
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
                            <a href="{{ route('transactions.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
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


