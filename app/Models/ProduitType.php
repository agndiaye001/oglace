<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;
use App\Models\Barcode;

class ProduitType extends Model
{
    use HasFactory;
    use ModelTree;
    // use DefaultDatetimeFormat;


    protected $table="produit_types";
    public function barcode(){
        return $this->hasOne(Barcode::class, 'id', 'barcode_id');
    }

   
}
