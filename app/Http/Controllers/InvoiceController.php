<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    /**
     * Create a new InvoiceController instance.
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
            $invoices = Invoice::get();
            return response()->json(['data'=>$invoices],200);
        }catch(\Exception $e){
            return response('No se pudieron obtener las facturas: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
        try{
            $credentials = $request->all();

            $rules = [
                'number' => 'required|max:255',
                'description' => 'required',
                'date' => 'required',
                'amount' => 'required',
                'payment_type' => 'required',
                'client_id' => 'required'

            ];
            $validator = Validator::make($credentials, $rules);

            if($validator->fails()) {
                return response()->json(['ok'=> false, 'error'=> 'Error de validación de campos']);
            }

            $status = $request->status;
            $number = $request->number;
            $description = $request->description;
            $date = $request->date;
            $amount = $request->amount;
            $payment_type = $request->payment_type;
            $client_id = $request->client_id;

            Invoice::create(['status' => $name]);

            return response()->json(['ok'=> true],200);
        }catch(\Exception $e){
            return response('No se pudo crear el tipo de pago: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
