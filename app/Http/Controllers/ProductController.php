<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products=Product::all();
        $products=Product::paginate(12);
        $categorias=Categorie::all();
// 'urlImage',
        return view('shop.index', compact('products',  'categorias'));
    }
    public function cart(Request $request)
    {
        
        $products=Product::paginate(12);
        $categorias=Categorie::all();
        
    
        $productoElegido=$request->id;
        $product=Product::find($productoElegido);    
        dd($product);
        $product=Cart::create([
            'title'=>$request->input('title'),
            'price'=>$request->input('price'),
            //todo
            'qty'=>$request->input('qty')
            ]);
        
        
        
         return view('shop.index', compact('products',  'categorias'));

      
    }
    public function order($order)
    {
        // $products=Product::all();
        $products=Product::orderBy($order)->paginate(12);

        return view('shop.index', compact('products', 'urlImage'));
    }
    public function test()
    {
        
        return view('test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
