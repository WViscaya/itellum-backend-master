<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Create a new ClientController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $clients = Client::get();
            return response()->json(['data'=>$clients],200);
        }catch(\Exception $e){
            return response('No se pudieron obtener los clientes: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
        try {
            Log::info($request->all());

            $credentials = $request->all();

            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'account_type' => 'required',
                'number_id' => 'required',
                'email' => 'required|email',
                'country_id' => 'required',
                'address1' => 'required',
                'username' => 'required',
                'password' => 'required'

            ];
            $validator = Validator::make($credentials, $rules);

            if($validator->fails()) {
                return response()->json(['success'=> false, 'error'=> 'Error de validación de campos'],500);
            }

            Client::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'account_type' => $request->account_type,
                'number_id' => $request->number_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'country_id' => $request->country_id,
                'province_id' => $request->province_id,
                'canton_id' => $request->canton_id,
                'city_id' => $request->city_id,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'postal_code' => $request->postal_code,
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);

            return response()->json(['success'=> true],200);

        }catch(\Exception $e){
            Log::info('Error al guardar el cliente: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
            return response('Error al guardar el cliente: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
        }
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
