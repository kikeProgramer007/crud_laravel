<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $products = Product::paginate(100);
        return view('product.index')->with('products', $products);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'descripcion'=>'required',
            'precio'=>'required|gte:1',
            'stock'=>'required'
        ]);
        $product = Product::create($request->only('nombre','descripcion','precio','stock')); //CREAR REGISTRO
        session::flash('mensaje','Registro creado satisfatoriamente');//crea un avarible de session para almacenar ese mensaje
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.form')->with('product',$product); //PASAR DATOS ESA FUNCION
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'descripcion'=>'required',
            'precio'=>'required|gte:1',
            'stock'=>'required'
        ]);
        $product->nombre = $request['nombre'];
        $product->descripcion = $request['descripcion'];
        $product->precio = $request['precio'];
        $product->stock = $request['stock'];
        $product->save();
        session::flash('mensaje','Registro editado satisfatoriamente');//crea un avarible de session para almacenar ese mensaje
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session::flash('mensaje','Registro eliminado con exito!');//crea un avarible de session para almacenar ese mensaje
        return redirect()->route('product.index');
    }

    public function eliminar( Product $product){
        
        $product->delete();
        session::flash('mensaje','Registro eliminado con exito!');
       return redirect()->to(asset('product'));
    }
}
