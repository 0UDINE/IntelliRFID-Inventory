<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alerte extends Model
{
    use HasFactory; 
    protected $fillable = ['produit_id', 'type_alerte', 'message', 'vue'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}

