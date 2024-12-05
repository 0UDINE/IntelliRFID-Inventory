<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends Model
{
    use HasFactory; 
    protected $fillable = ['nom', 'email', 'role'];

    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }
}

