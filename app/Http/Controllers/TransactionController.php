<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\TransactionsExport;
use App\Models\Status;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Transaction';
        // $transactions = Transaction::all();

        // $this->middleware('admin')->only('index');

        return view('admin.dashboard', compact('pageTitle'));
    }

    public function getData(Request $request)
    {
        $transactions = Transaction::with(['status', 'payment', 'product', 'user']);

        if ($request->ajax()) {
            return datatables()->of($transactions)
                ->addIndexColumn()
                ->addColumn('action', function($transaction) {
                    return view('admin.action', compact('transaction'));
                })
                ->toJson();
        }
    }

    public function gProduct()
    {
        $pageTitle = 'Product List';

        $products = Product::all();

        return view('admin.product', compact('pageTitle', 'products'));
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
            $transaction->status_id = 3;
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
        $pageTitle = 'Status';

        // menampilkan semua data pada tabel position
        $statuses = Status::all();
        // menampilkan data sesuai dengan id yang dipilih
        $transaction = Transaction::find($id);

        return view('admin.edit', compact('pageTitle', 'statuses', 'transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);
        $transaction->status_id = $request->status;

        $transaction->save();

        Alert::success('Added Successfully', 'Edit Status Successfully.');

        return redirect()->route('transactions.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportExcel()
    {
        return Excel::download(new TransactionsExport, 'transactions.xlsx');
    }

    public function exportPdf()
    {
        $transactions = Transaction::all();

        $pdf = PDF::loadView('admin.export_pdf', compact('transactions'));

        return $pdf->download('transactions.pdf');
    }


}
