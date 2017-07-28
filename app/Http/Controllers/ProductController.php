<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // public $carrito=[]
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $products=Product::paginate(12);
        $categorias=Categorie::all();
      if (session('carrito')) {
           $var=session('carrito');
            foreach ($var as $id) {
                $producto=Product::find($id);    
                $productos[]=$producto;

            }
    
        }

    // 'urlImage',
        return view('shop.index', compact('products',  'categorias', 'productos'));
    }




    public function cart(Request $request)
    {
        
        $products=Product::paginate(12);
        $categorias=Categorie::all();
        

        $productoElegido=$request->id;
        session()->push('carrito', $productoElegido);
        $carrito=[];

         if (session('carrito')) {
           $var=session('carrito');
            foreach ($var as $id) {
                $producto=Product::find($id);    
                $productos[]=$producto;

            }

    }
        //$product=Product::find($productoElegido);    
        
//usuario-    compra-item-producto
      //  session(['cart'=>[$product,'otro producto']]); 


        // $product=Cart::create([
        //     'title'=>$request->input('title'),
        //     'price'=>$request->input('price'),
        //     //todo
        //     'qty'=>$request->input('qty')
        //     ]);
        
        
        
         return view('shop.index', compact('products',  'categorias', 'productos'));

      
    }
    public function order($order)
    {
        // $products=Product::all();
        $products=Product::orderBy($order)->paginate(12);
        $categorias=Categorie::all();

        return view('shop.index', compact('products', 'urlImage', 'categorias'));
    }
   

    public function show($id)
    {
        //
    }

    
    public function destroy(Request $request)
    {
        dd(1);
        $request->session()->forget('carrito');
    }

    public function destroyAll(Request $request)
    {
        if (session('carrito')) {
           $request->session()->flush();
        }
        
        return redirect('shop/index');
    }


}
