<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class favorite extends Model
{
    protected $fillable = [
        'user_id', 'product_id',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produit()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_produit');    }
    
    public function favorited()
    {
        return $this->morphTo('produit');
    }
   
}
