@extends('layouts.app')

@section('content')
<style>
    #selectedMethod {
        display: none;
    }
</style>
<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <table id="cart" class="table table-hover table-condensed">
        <thead>
          <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $total = 0 @endphp
          @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            @php $total += $details['pprice'] * $details['qty'] @endphp
            <tr data-id="{{ $id }}">
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-3 hidden-xs">
                    <img src="{{ asset('img') }}/{{ $details['pphoto'] }}" width="100" height="100" class="img-responsive" />
                  </div>
                  <div class="col-sm-9">
                    <h4 class="nomargin">{{ $details['pname'] }}</h4>
                  </div>
                </div>
              </td>
              <td data-th="Price">Rp.{{ $details['pprice'] }}</td>
              <td data-th="Quantity">
                <input type="number" value="{{ $details['qty'] }}" class="form-control qty cart_update" min="1" />
              </td>
              <td data-th="Subtotal" class="text-center">Rp.{{ $details['pprice'] * $details['qty'] }}</td>
              <td class="actions" data-th="">
                {{-- <i class="fa fa-trash-o"></i> --}}
                <button class="btn btn-danger btn-sm cart_remove">Delete</button>
              </td>
            </tr>
            @endforeach
          @endif
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" style="text-align:right;"><h3><strong>Total Rp.{{ $total }}</strong></h3></td>
          </tr>
          <tr>
            <td colspan="5" style="text-align:right;">
              <form action="/session" method="POST">
                <a href="{{ route('products.food') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cartModal"><i class="fa fa-money"></i> Checkout</a>
              </form>
            </td>
          </tr>
          <tr>
            <td>
                <div class="btn-group d-flex">
                    <button type="button" class="btn btn-primary flex-fill mr-1" onclick="selectCash()">Tunai</button>
                    <button type="button" class="btn btn-primary flex-fill ml-1" onclick="selectQRIS()">QRIS</button>
                  </div>
                {{-- <label for="pymt" class="form-label">Type</label>
                <select name="pymt" id="pymt" class="form-select">
                  @foreach ($payments as $payment)
                      <option value="{{ $payment->id }}" {{ old('payment') == $payment->id ? 'selected' : '' }}>{{ $payment->pyname}}</option>
                  @endforeach
                </select> --}}

            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="cartModalLabel">Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-0">Thank you for your order!</p>
                <p class="mb-3">Here is your QR code:</p>
                <img src="{{ Vite::asset('resources/images/qris.png') }}" alt="" class="img-fluid mx-auto d-block" style="max-width: 250px;">
                <p class="h5 mt-3">Total Rp.{{ $total }}</p> <!-- Replace $50 with your actual total price variable -->
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    @foreach(session('cart') as $id => $details)
                        <input type="hidden" name="products[{{ $id }}][id]" value="{{ $id }}">
                        <input type="hidden" name="products[{{ $id }}][quantity]" value="{{ $details['qty'] }}">
                        <input type="hidden" name="products[{{ $id }}][price]" value="{{ $details['pprice'] * $details['qty'] }}">
                    @endforeach
                    <span id="selectedMethod"></span>
                    <input type="hidden" id="paymentMethodInput" name="payment_method" value="">
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript">
    // Fungsi untuk menampilkan metode pembayaran yang dipilih
    function displaySelection(selection) {
      document.getElementById("selectedMethod").innerHTML = selection;
      // Memperbarui nilai input type "hidden" dengan metode pembayaran yang dipilih
      document.getElementById("paymentMethodInput").value = selection;
    }

    // Fungsi yang dipanggil saat tombol "Tunai" diklik
    function selectCash() {
      displaySelection("1");
    }

    // Fungsi yang dipanggil saat tombol "QRIS" diklik
    function selectQRIS() {
      displaySelection("2");
    }

    // Script untuk proses update cart dengan AJAX
    $(".cart_update").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                qty: ele.parents("tr").find(".qty").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

    // Script untuk proses menghapus item dari cart dengan AJAX
    $(".cart_remove").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection
