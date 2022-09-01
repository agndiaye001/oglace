<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produit extends Model
{
    use HasFactory;
    public function produit(){
        return $this->hasOne(ProduitType::class, 'id', 'type_id');
    }
}
