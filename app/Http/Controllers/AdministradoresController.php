<?php

namespace App\Http\Controllers;

use App\Models\administradoresModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradoresController extends Controller
{

    public function index()
    {
        $datos = DB::select("select * from administradores");
        return view("administradores")->with("datos", $datos);
    }
}
