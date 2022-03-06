<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return response()->json([
            "data"=>$alumnos,
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
        $alumno = Alumno::create($request->all());
        return response()->json([
            "message"=>"El Alumno ha sido creado correctamente",
            "data"=>$alumno,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        $empresa= Empresa::findOrFail($alumno->id);
        return response()->json([
            "alumno"=>$alumno,
            "empresa"=>$empresa,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return response()->json([
            "message"=>"El Alumno ha sido actualizado correctamente",
            "data"=>$alumno,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json([
            "message"=>"El ALumno ha sido eliminado correctamente",
            "data"=>$alumno,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
