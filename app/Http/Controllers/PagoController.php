<?php

namespace App\Http\Controllers;

use App\Pago;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::all();
        return response()->json([
            "data"=>$pagos,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago = Pago::create($request->all());
        return response()->json([
            "message"=>"El Pago ha sido creado correctamente",
            "data"=>$pago,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        return response()->json([
            "data"=>$pago,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        $pago->update($request->all());
        return response()->json([
            "message"=>"El Pago ha sido actualizado correctamente",
            "data"=>$pago,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        $pago->delete();
        return response()->json([
            "message"=>"El Pago ha sido eliminado correctamente",
            "data"=>$pago,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
