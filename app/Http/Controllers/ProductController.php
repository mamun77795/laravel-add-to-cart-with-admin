<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = new ProductCollection(Product::all());
        return view('products', compact('products'));
    }
    public function cart(){
        return view('cart');
    }
    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                'id'=>$product->id,
                'product_name'=> $product->product_name,
                'photo'=>$product->photo,
                'price'=>$product->price,
                'quantity'=>1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Product add to cart successfully!');
    }

    public function remove(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed');
        }
    }

    public function update1(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success','Cart successfully updated!');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
