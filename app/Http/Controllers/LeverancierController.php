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
        $leverancierById = $this->leverancierModel->getLeverancierById($id);

        return view ('leveranciers.show', [
            'title' => 'Leverancier Details',
            'leverancierById' => $leverancierById
        ]);
    }

    public function edit($id)
    {
        $leverancierById = $this->leverancierModel->getLeverancierById($id);

        return view('leveranciers.edit', [
            'title' => 'Leverancier Bewerken',
            'leverancierById' => $leverancierById
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'Naam',
            'Contactpersoon',
            'LeverancierNummer',
            'Mobiel',
            'ContactId',
            'Straat',
            'Huisnummer',
            'Postcode',
            'Stad',
        ]);

        $affectedRows = $this->leverancierModel->sp_UpdateLeverancier(
            $id,
            $data['Naam'],
            $data['Contactpersoon'],
            $data['LeverancierNummer'],
            $data['Mobiel'],
            $data['ContactId'],
            $data['Straat'],
            $data['Huisnummer'],
            $data['Postcode'],
            $data['Stad'],
        );

        if ($affectedRows > 0) {
            return redirect()->route('leverancier.show', ['id' => $id])
                             ->with('success', 'Leverancier succesvol bijgewerkt.');
        } else {
            return redirect()->back()
                             ->with('error', 'Er is een fout opgetreden bij het bijwerken van de leverancier.');
        }
    }
}
