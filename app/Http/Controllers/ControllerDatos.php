<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datos;
class ControllerDatos extends Controller
{
    public function datosDeDB()
    {
        return response()->json
        ([
          'status' => 200,
          'data' => Datos::take(3)->orderBy("created_at", "desc")->get()
        ]);
    }
}
