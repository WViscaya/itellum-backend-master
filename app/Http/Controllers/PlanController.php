<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $plans = Plan::get();
            return response()->json(['data'=>$plans],200);
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
        $plans = Plan::create($request->all());
        return $plans;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plans = Plan::find($id);

        return response()->json([
            'ok'=>true,
            'data'=>$plans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        try{
            $plans = Plan::find($id);

            if($plans == false){
                return response()->json([
                    'ok'=>false,
                    'error'=>'No se encontro',
                ]);
            }

            $plans->update($credentials);

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
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plans = Plan::find($id);
        $plans->delete();

        return response()->json([
            'ok'=>true,
            'mensaje'=>'Se eliminó con exito'
        ]);
    }
}
