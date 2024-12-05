<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rapport extends Model
{
    use HasFactory; 
    protected $fillable = ['utilisateur_id', 'type_rapport', 'format', 'contenu'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}

