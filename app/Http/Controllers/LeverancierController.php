<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\LeverancierModel;

class LeverancierController extends Controller
{
    private $leverancierModel;

    public function __construct()
    {
        $this->leverancierModel = new LeverancierModel();
    }

    public function index()
    {
        $leveranciers = $this->leverancierModel->getLeveranciers();

        return view('leveranciers.index', [
            'title' => 'Overzicht Leveranciers',
            'leveranciers' => $leveranciers
        ]);
    }

    public function show($id)
    {
        return view ('leveranciers.show', [
            'title' => 'Leverancier Details',
            'leverancierId' => $id
        ]);
    }
}
