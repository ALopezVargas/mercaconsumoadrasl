<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable=['nombre','foto','categoria_id','precio','cantidad'];

    public function productosCarrito(){
        return $this->hasMany(Producto::class);
    }
}
