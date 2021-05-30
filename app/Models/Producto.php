<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'pvp', 'stock', 'imagen', 'categoria_id', 'proveedor_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    //scopes
    public function scopeNombre($query, $valor)
    {
        if (!isset($valor)) {
            return $query->where('nombre', 'like', '%');
        }
        switch ($valor) {
            case "%":
                return $query->where('nombre', 'like', '%');
            case "1":
                return $query->where('nombre', 'like', 'a%')
                    ->orWhere('nombre', 'like', 'b%')
                    ->orWhere('nombre', 'like', 'c%')
                    ->orWhere('nombre', 'like', 'd%')
                    ->orWhere('nombre', 'like', 'e%')
                    ->orWhere('nombre', 'like', 'f%');
            case "2":
                return $query->where('nombre', 'like', 'g%')
                    ->orWhere('nombre', 'like', 'h%')
                    ->orWhere('nombre', 'like', 'i%')
                    ->orWhere('nombre', 'like', 'j%')
                    ->orWhere('nombre', 'like', 'k%')
                    ->orWhere('nombre', 'like', 'l%');
            case "3":
                return $query->where('nombre', 'like', 'm%')
                    ->orWhere('nombre', 'like', 'n%')
                    ->orWhere('nombre', 'like', 'o%')
                    ->orWhere('nombre', 'like', 'p%')
                    ->orWhere('nombre', 'like', 'q%')
                    ->orWhere('nombre', 'like', 'r%');
            case "4":
                return $query->where('nombre', 'like', 's%')
                    ->orWhere('nombre', 'like', 't%')
                    ->orWhere('nombre', 'like', 'u%')
                    ->orWhere('nombre', 'like', 'v%')
                    ->orWhere('nombre', 'like', 'w%')
                    ->orWhere('nombre', 'like', 'x%')
                    ->orWhere('nombre', 'like', 'y%')
                    ->orWhere('nombre', 'like', 'z%');
        }
    }
    public function scopeCategoria($query, $valor)
    {
        if (!isset($valor)) {
            return $query->where('categoria_id', 'like', '%');
        }
        switch ($valor) {
            case "0":
                return $query->where('categoria_id', 'like', '%');
            case "1":
                return $query->where('categoria_id', 'like', '1');
            case "2":
                return $query->where('categoria_id', 'like', '2');
            case "3":
                return $query->where('categoria_id', 'like', '3');
            case "4":
                return $query->where('categoria_id', 'like', '4');
            case "5":
                return $query->where('categoria_id', 'like', '5');
            case "6":
                return $query->where('categoria_id', 'like', '6');
            case "7":
                return $query->where('categoria_id', 'like', '7');
            case "8":
                return $query->where('categoria_id', 'like', '8');
            case "8":
                return $query->where('categoria_id', 'like', '9');
        }
    }
    public function scopePvp($query, $valor)
    {
        if (!isset($valor)) {
            return $query->where('pvp', '>=', 0);
        }
        switch ($valor) {
            case "%":
                return $query->where('pvp', '>=', 0);
            case "1":
                return $query->where('pvp', '>=', 1)
                    ->where('pvp', '<', 50);
            // ->where([
            //     ['pvp', '>=', 1],
            //     ['pvp', '<=', 50]
            //     ]);
            case "2":
                return $query->where([
                    ['pvp', '>=', 50],
                    ['pvp', '<', 100],
                ]);
            case "3":
                return $query->where([
                    ['pvp', '>=', 100],
                    ['pvp', '<', 200],
                ]);
            case "4":
                return $query->where([
                    ['pvp', '>=', 200],
                    ['pvp', '<', 400],
                ]);
            case "5":
                return $query->where([
                    ['pvp', '>=', 400],
                    ['pvp', '<', 600],
                ]);
            case "6":
                return $query->where([
                    ['pvp', '>=', 600],
                    ['pvp', '<', 800],
                ]);
            case "7":
                return $query->where('pvp', '>', 800);
        }
    }

}
