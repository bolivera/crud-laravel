<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IntegrantesController extends Controller
{
    //

    public function index()
    {
        $integrantes = DB::select('SELECT * FROM integrantes');
        return view('welcome',[
                'integrantes' => $integrantes
        ]);
    }
    
    public function formulario($id = null)    
    {
        $data = [];

        if(!empty($id)){
            $data['integrante'] = DB::table('integrantes')->where('id', $id)->first();
        }
        return view('formulario', $data);
    }

    public function guardar(Request $request)
    {
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $codigo = $request->codigo;  

        $idFormulario = (int)$request->id;
        
        if($idFormulario !== 0){
            // ACTUALIZAR EN LA BD
           DB::table('integrantes')->where('id', $request->id)->update([
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'codigo' => $codigo
           ]);
        }else{
            // INSERTAR EN LA BD
            DB::insert('INSERT INTO integrantes (nombres, apellidos,codigo) values (?,?,?)', [$nombres,$apellidos,$codigo]);
        }
        return redirect()->back()->with('success', 'Ingregrante guardado correctamente');

     }

     public function eliminar(Request $request)
     {
         $id = (int)$request->id;
         DB::table('integrantes')->where('id', $id)->delete();
         return response()->json(['status' => true], 200);
     }

     public function buscar(Request $request)
     {
        $busqueda = $request->buscar;
        $integrantes = DB::table('integrantes')->where('nombres','like',"%$busqueda%")->get();
        return view('welcome',[
                'integrantes' => $integrantes,
                'metodo' => 'buscar',
                'busqueda' => $busqueda
        ]);
     }
}
