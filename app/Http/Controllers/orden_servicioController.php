<?php

namespace App\Http\Controllers;

use App\Models\orden_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orden_servicioController extends Controller
{
    
        public function index()
    {
        $datos = DB::select("select * FROM orden_servicio");
        return view("orden_servicio")->with("datos", $datos);
    }
}