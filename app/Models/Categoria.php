<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Producto;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable=['nombre','imagen'];

    public function productos(){
        return $this->hasMany(Producto::class);//retorna todos los productos de la clase Producto
        //El hasMany define una relación de uno a muchos (1:N) , de tal manera que muchos productos puedan pertenecer a 1 categoría.
        //Categoria -> tienenMuchos -> Productos

    }
}
