<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit_pharmacie extends Model
{
    protected $table = 'produit_pharmacie';

    protected $fillable = [
        'id_produit',
        'id_pharmacie',
    ];
}
