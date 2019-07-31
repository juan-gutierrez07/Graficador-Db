<?php

use Illuminate\Http\Request;
use App\Datos;

Route::get('/api',['middleware'=>'permiso', function (Request $resp)
{
    $Dat = new Datos();
    $Query = intval($resp->input('db'));
    $dato=(20*log(10))*($Query/5);
    $Dat->Total_Db=intval($dato);
    $Dat->save();
  
    return response()->json
    ([
      'status' => 200,
      
    ]);
}]); 

Route::get('/api/datos','ControllerDatos@datosDeDB'); 

Route::get('/p',function()
{
   return view('tabla');
});

Route::get('/M',function(){return view('imagenes');});


 

