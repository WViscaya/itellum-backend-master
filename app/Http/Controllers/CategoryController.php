<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            $categories = Category::get();
            return response()->json(['data'=>$categories],200);
        }catch(\Exception $e){
            return response('No se pudieron obtener las categorias: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
        $categories = Category::create($request->all());
        return $categories;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);

        return response()->json([
            'ok'=>true,
            'data'=>$categories
        ]);
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
        $credentials = $request->all();

        try{
            $categories = Category::find($id);

            if($categories == false){
                return response()->json([
                    'ok'=>false,
                    'error'=>'No se encontro',
                ]);
            }

            $categories->update($credentials);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();

        return response()->json([
            'ok'=>true,
            'mensaje'=>'Se eliminó con exito'
        ]);
    }
}
