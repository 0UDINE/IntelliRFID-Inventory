<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory; 
    protected $fillable = [
        'nom', 'categorie', 'marque', 'quantite_stock', 'seuil_alerte', 'prix',
    ];

    public function etiquettes()
    {
        return $this->hasMany(EtiquetteRFID::class);
    }

    public function alertes()
    {
        return $this->hasMany(Alerte::class);
    }

    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }
}
