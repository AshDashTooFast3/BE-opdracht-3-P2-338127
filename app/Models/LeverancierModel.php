<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeverancierModel extends Model
{
    protected $table = 'Leveranciers';

    protected $fillable = [
        'Naam',
        'Contactpersoon',
        'LeverancierNummer',
        'Mobiel',
        'ContactId',
    ];

    public function getLeveranciers()
    {
        return DB::SELECT ('CALL GetLeveranciers()');
    }

    public function getLeverancierById($id)
    {
        return DB::SELECT ('CALL GetLeverancierById(?)', [$id]);
    }

    public function sp_UpdateLeverancier($id, $naam, $contactpersoon, $leverancierNummer, $mobiel, $contactId, $straat, $huisnummer, $postcode, $stad)
    {
        $row = DB::selectOne(
            'CALL sp_UpdateLeverancier(:id, :naam, :contactpersoon, :leverancierNummer, :mobiel, :contactId, :straat, :huisnummer, :postcode, :stad)', [
                'id' => $id,
                'naam' => $naam,
                'contactpersoon' => $contactpersoon,
                'leverancierNummer' => $leverancierNummer,
                'mobiel' => $mobiel,
                'contactId' => $contactId,
                'straat' => $straat,
                'huisnummer' => $huisnummer,
                'postcode' => $postcode,
                'stad' => $stad,
            ]
        );

        return $row->affected ?? 0;
    }

}
