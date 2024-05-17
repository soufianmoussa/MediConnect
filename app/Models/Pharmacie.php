<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{protected $table = 'pharmacie';

    protected $fillable = ['id',
    'nom_pharmacie',
    'adresse'
    ,'localisation',
    'Telephone'
];
    use HasFactory;
    public function product()
    {
        return $this->belongsToMany(Product::class,"produit_pharmacie",'id_produit', 'id_pharmacie');
    }
}
