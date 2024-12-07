<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    protected $fillable = ['action', 'produit_id', 'changes'];

    // Relation avec le modèle Produit
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
