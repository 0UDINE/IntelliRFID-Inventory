<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class EtiquetteRFID extends Model
{
    use HasFactory; 

     // This tells Laravel to treat these attributes as Carbon instances
    protected $dates = ['date_activation', 'last_scanned_at'];
    protected $table = 'etiquette_rfids';
    protected $fillable = ['produit_id', 'code_rfid', 'date_activation', 'actif', 'last_scanned_at', 'scan_count'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}

