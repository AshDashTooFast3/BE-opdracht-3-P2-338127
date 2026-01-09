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
}
