<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'pvp', 'stock', 'imagen', 'categoria_id', 'proveedor_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

}
