<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeverancierController extends Controller
{
    public function index()
    {

        return view('leveranciers.index');
    }
}
