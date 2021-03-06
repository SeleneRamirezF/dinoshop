<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'user_id', 'fecha', 'total', 'estado'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function cliente(){
        return $this->belongsTo(Pedido::class);
    }
    public function detallesVenta(){
        return $this->hasMany(DetalleVenta::class);
    }
}
