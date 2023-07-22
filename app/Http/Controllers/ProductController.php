<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'Product List';

        $products = Product::all();

        return view('admin.product', compact('pageTitle', 'products'));
    }

    public function food()
    {
        $pageTitle = 'Foods List';

        $foods = Product::where('type_id', 1)->get();

        return view('product.food', compact('pageTitle', 'foods'));
    }

    public function drink()
    {
        $pageTitle = 'Drinks List';
        $drinks = Product::where('type_id', 2)->get();

        return view('product.drink', compact('pageTitle', 'drinks'));
    }

    public function snack()
    {
        $pageTitle = 'Snacks List';
        $snacks = Product::where('type_id', 3)->get();

        return view('product.snack', compact('pageTitle', 'snacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Product';

        $types = Type::all();

        return view('admin.createProduct', compact('pageTitle', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = New Product;
        $product->pname = $request->pName;
        $product->pprice = $request->pPrice;
        $product->pqty = $request->pQty;
        $product->pphoto = $request->pPhoto;
        $product->type_id = $request->type;

        $product->save();

        return redirect()->route('products.index');
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
