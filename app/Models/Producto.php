<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=['nombre','descripcion','foto','categoria_id','precio','oferta'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
        //Define la relación de muchos a 1 (N:1)-> (1:1). De tal manera que LOS productos pertenecen a 1 categoría.
        //Productos -> pertenecen -> a una Categoria
    }
}
