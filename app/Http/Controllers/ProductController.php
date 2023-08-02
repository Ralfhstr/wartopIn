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

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        }  else {
            $cart[$id] = [
                "pname" => $product->pname,
                "pdesc" => $product->pdesc,
                "pphoto" => $product->pphoto,
                "pprice" => $product->pprice,
                "qty" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->qty){
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
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
        $file = $request->file('pPhoto');

        if ($file != null) {
            $Pphoto = $file->getClientOriginalName();

            // Store File
            $file->storeAs('public/images', $Pphoto);
        }

        $product = New Product;
        $product->pname = $request->pName;
        $product->pdesc = $request->pDesc;
        $product->pprice = $request->pPrice;
        $product->type_id = $request->type;

        if ($file != null) {
            $product->pphoto = $Pphoto;
        }

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
