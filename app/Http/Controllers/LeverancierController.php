<?php

namespace App\Http\Controllers;

use App\Models\LeverancierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeverancierController extends Controller
{
    private $leverancierModel;

    public function __construct()
    {
        $this->leverancierModel = new LeverancierModel;
    }

    public function index()
    {
        $leveranciers = $this->leverancierModel->getLeveranciers();

        return view('leveranciers.index', [
            'title' => 'Overzicht Leveranciers',
            'leveranciers' => $leveranciers,
        ]);
    }

    public function show($id)
    {
        $leverancierById = $this->leverancierModel->getLeverancierById($id);

        return view('leveranciers.show', [
            'title' => 'Leverancier Details',
            'leverancierById' => $leverancierById,
        ]);
    }

    public function edit($id)
    {
        $leverancierById = $this->leverancierModel->getLeverancierById($id);

        return view('leveranciers.edit', [
            'title' => 'Wijzig Leveranciergegevens',
            'leverancierById' => $leverancierById,
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

        Log::info("Aantal bijgewerkte rijen: {$affectedRows}");

        if ($affectedRows > 0) {
            return redirect()->route('leverancier.edit', ['id' => $id])
                ->with('success', 'De wijzigingen zijn doorgevoerd.');
        } else {
            return redirect()->back()
                ->with('error', 'Er is een fout opgetreden bij het bijwerken van de leverancier.');
        }
    }
}
