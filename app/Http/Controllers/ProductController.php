<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $log = ['usuario' => '0', 'accion' => 'PRODUCTO.FILTRAR', 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);

        $query = Product::query();

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        if ($request->filled('clave')) {
            $query->where('clave', 'like', '%' . $request->clave . '%');
        }

        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->marca . '%');
        }

        if ($request->filled('created_by')) {
            $query->where('created_by', 'like', '%' . $request->created_by . '%');
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        if ($request->filled('updated_at')) {
            $query->whereDate('updated_at', $request->updated_at);
        }

        if ($request->filled('activo')) {
            $query->where('activo', $request->activo);
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log = ['usuario' => '0', 'accion' => 'PRODUCTO.CREAR', 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);
        //
        $request->validate([
            'nombre' => 'required',
            'clave' => 'required',
            'marca' => 'required',
        ]);

        $data = $request->all();

        $data['fecha_alta'] = now();

        if (isset($data['activo']))
            $data['activo'] = 0;
        else
            $data['activo'] = 1;

        Product::create($data);
        return redirect()->route('products.index');
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
        //
        return view('products.edit', compact('product'));
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
        $log = ['usuario' => '0', 'accion' => 'PRODUCTO.EDITAR', 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);
        //
        //
        $request->validate([
            'nombre' => 'required',
            'clave' => 'required',
            'marca' => 'required',
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo');

        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $log = ['usuario' => '0', 'accion' => 'PRODUCTO.ELIMINAR', 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);
        //
        $product->delete();
        return redirect()->route('products.index');
    }

    public function toggleActive(Product $product)
    {
        $accion = $product->activo?"ACTIVAR":"DESACTIVAR";
        $log = ['usuario' => '0', 'accion' => 'PRODUCTO.' . $accion, 'fecha' => date('Y-m-d H:i:s')];

        Log::create($log);
        $product->activo = !$product->activo;
        $product->save();
        return redirect()->route('products.index');
    }
}
