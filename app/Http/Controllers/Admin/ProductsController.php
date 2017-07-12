<?php

namespace App\Http\Controllers\admin;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $productos=Product::paginate(24);
       return view('admin/products/product', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categorie::all();
        
        return view('admin/products/create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
            [
            
            'title'=>'bail|required|max:255',
            'price'=>'required',
            'description'=>'required|max:100'
            ,
            'imagePath'=>'required'
            ],[
            'required'=>'El campo :attribute es obligatorio'
            ]
            );
        $product=Product::create([
            'title'=>$request->input('title'),
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'imagePath'=>str_slug($request->input('imagePath')), 
            'categorie_id'=>$request->input('category')
            ]);

        // guardar la imagen
        //str slug sanitiza el nombre y los espacios los pone con un guion
       
        $nombreImagen = $product->id . '.' . str_slug($product->title) . '.' .request()->imagePath->extension();
        // storeAs recibe dos parametros el nombre de la carpeta y el nombre del archivo
        request()->imagePath->storeAs('public', $nombreImagen);
        $product->imagePath = $nombreImagen;
        
        
        $product->save();

        return redirect()->action('Admin\ProductsController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product=Product::find($id);
        $imageName=$product->imagePath;

        //aca esta funcion para mostrar la imagen, storage::url va a la carpeta storage!!! hay que incluir el app\storage o apretar f5
        $urlImage = Storage::url($imageName);
        // $resultado=isset($producto[$id])?$producto[$id]:'el producto no existe';
        //el primer parametro de view es la vista relativa a views
        return view('/admin/products/show', compact('product', 'urlImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $product=Product::find($id);
        return view('/admin/products/edit', compact('product'));
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
        $this->validate($request,
            [
            'title'=>'required|max:50',
            'price'=>'required',
            'description'=>'required|max:100'
            ,
            'imagePath'=>'required'
            ],[
            'required'=>'El campo :attribute es obligatorio'
            ]
            );
        $product=Product::find($id);
        $product->title  = $request->input('title');
        $product->price  = $request->input('price');
        $product->description  = $request->input('description');
        // $product->imagePath  = $request->input('imagePath');

        $nombreImagen = str_slug($product->title) . '.' .request()->imagePath->extension();
        // storeAs recibe dos parametros el nombre de la carpeta y el nombre del archivo
        request()->imagePath->storeAs('public', $nombreImagen);
        $product->imagePath = $nombreImagen;
    
        $product->save();

        return redirect()->action('Admin\ProductsController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $product=Product::find($id);
         $image=str_slug($product->imagePath);
         //no se borro la imagen ???
         Storage::delete($image);
         $product->delete();
         
          return back();
    
    }
}
