<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{ protected $table = 'produit';
    protected $primaryKey = 'id_produit';
    use HasFactory;
    protected $fillable = [
        "id_produit",
        "nom",
        "categorie",
        "prix",
        "description",
        "substance"
    ];

    public function pharmacies()
    { 
        return $this->belongsToMany(Pharmacie::class,"produit_pharmacie",'id_produit', 'id_pharmacie');
    }
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'produit',);
    }
}
