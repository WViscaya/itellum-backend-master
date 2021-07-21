<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $products = Product::get();
            return response()->json(['data'=>$products],200);
        }catch(\Exception $e){
            return response('No se pudieron obtener los productos: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = Product::create($request->all());
        return $products;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Product::find($id);

        return response()->json([
            'ok'=>true,
            'data'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        try{
            $products = Product::find($id);

            if($products == false){
                return response()->json([
                    'ok'=>false,
                    'error'=>'No se encontro',
                ]);
            }

            $products->update($credentials);

            return response()->json([
                'ok'=>true,
                'mensaje'=>'Se modifico con exito'
            ]);
        }catch(\Exception $ex){
            return response()->json([
                'ok'=>false,
                'error'=>$ex->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return response()->json([
            'ok'=>true,
            'mensaje'=>'Se eliminó con exito'
        ]);
    }
}
