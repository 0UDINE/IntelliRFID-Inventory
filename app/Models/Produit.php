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

    protected static function booted()
{
    // Listen to 'created' event
    static::created(function ($produit) {
        Modification::create([
            'action' => 'added',
            'produit_id' => $produit->id,
            'changes' => $produit->toJson(),
        ]);
    });

    // Listen to 'updated' event
    static::updated(function ($produit) {
        Modification::create([
            'action' => 'updated',
            'produit_id' => $produit->id,
            'changes' => json_encode([
                'before' => $produit->getOriginal(),
                'after' => $produit->getChanges(),
            ]),
        ]);
    });

    // Listen to 'deleted' event
    static::deleted(function ($produit) {
        Modification::create([
            'action' => 'deleted',
            'produit_id' => $produit->id,
            'changes' => $produit->toJson(),
        ]);
    });
}
}
