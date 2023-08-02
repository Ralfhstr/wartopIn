<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Transaction';
        $transactions = Transaction::all();

        return view('admin.dashboard', compact('pageTitle', 'transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payments = Payment::all();

        return view('product.cart', compact('payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cartData = $request->input('products');
        $paymentMethod = $request->input('payment_method');

        // Get the authenticated user
        $user = Auth::user();

        // Initialize an array to store all the transactions
        $transactions = [];

        // Simpan data ke tabel transaksi dengan menyimpan informasi user yang memesan produk
        foreach ($cartData as $product) {
            $transaction = new Transaction();
            $transaction->user_id = $user->id; // Simpan ID user yang sedang login
            $transaction->product_id = $product['id'];
            $transaction->tqty = $product['quantity'];
            $transaction->tprice = $product['price'];
            $transaction->payment_id = $paymentMethod;
            $transaction->status_id = 1;
            $transactions[] = $transaction->toArray();
        }

        // Save all the transactions in a batch
        Transaction::insert($transactions);

        return redirect()->route('products.food');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
