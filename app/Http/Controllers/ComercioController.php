<?php

namespace App\Http\Controllers;
use App\Models\Comercio;
use Illuminate\Http\Request;

class ComercioController extends Controller
{
    public function index()
    {
       return Comercio::with('transacciones')->get();

    }
 public function show(Comercio $comercio)
{
    return $comercio->load('transacciones');
}
}
