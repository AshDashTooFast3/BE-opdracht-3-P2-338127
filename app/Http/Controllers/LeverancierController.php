<?php

namespace App\Http\Controllers;

use App\Models\LeverancierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class LeverancierController extends Controller
{
    private $leverancierModel;

    public function __construct()
    {
        $this->leverancierModel = new LeverancierModel;
    }

    public function index()
    {
        $leveranciers = LeverancierModel::paginate(4);

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

        $data = $request->validate([
            'Naam' => 'required|string|max:255',
            'Contactpersoon' => 'required|string|max:255',
            'LeverancierNummer' => 'required|string|max:50',
            'Mobiel' => 'nullable|string|max:15',
            'ContactId' => 'required|integer',
            'Straat' => 'required|string|max:255',
            'Huisnummer' => 'required|string|max:10',
            'Postcode' => 'required|string|max:10',
            'Stad' => 'required|string|max:255',
            'IsActief' =>'required',
        ]);
        if ($data['IsActief'] == 0) {
            return redirect()->route('leverancier.edit', ['id' => $id])
                ->with('error', 
                'Door een technische storing is het niet mogelijk de wijziging door te voeren. 
                        Probeer het op een later moment nog eens');
        }
        else {

        $affectedRows = $this->leverancierModel->UpdateLeverancier(
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

        return redirect()->route('leverancier.edit', ['id' => $id])
        ->with('success', 'De wijzigingen zijn doorgevoerd.');
        }
    }
}
