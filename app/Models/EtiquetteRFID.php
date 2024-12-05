<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EtiquetteRFID extends Model
{
    use HasFactory; 
    
    protected $table = 'etiquette_rfids';
    protected $fillable = ['produit_id', 'code_rfid', 'date_activation', 'actif'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}

