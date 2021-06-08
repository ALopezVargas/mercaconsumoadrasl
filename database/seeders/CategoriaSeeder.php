<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre'=>"Limpieza",
            'imagen'=>"storage/img/limpieza.jpg",

        ]);
        Categoria::create([
            'nombre'=>"Platos Preparados",
            'imagen'=>"storage/img/ppreparados.jpg",

        ]);
        Categoria::create([
            'nombre'=>"Frescos",
            'imagen'=>"storage/img/frescos.jpg",

        ]);
        Categoria::create([
            'nombre'=>"Despensa",
            'imagen'=>"storage/img/despensa.jpeg",

        ]);
        Categoria::create([
            'nombre'=>"Mascotas",
            'imagen'=>"storage/img/mascotas.jpg",

        ]);
        Categoria::create([
            'nombre'=>"Bebé",
            'imagen'=>"storage/img/bebes.jpg",

        ]);
        Categoria::create([
            'nombre'=>"Cuidado Personal",
            'imagen'=>"storage/img/cuidadopersonal.png",

        ]);
        Categoria::create([
            'nombre'=>"Bebidas",
            'imagen'=>"storage/img/bebidas.jpg",

        ]);
        Categoria::create([
            'nombre'=>"Bodega",
            'imagen'=>"storage/img/bodega.jpg",

        ]);
        Categoria::create([
            'nombre'=>"Congelados",
            'imagen'=>"storage/img/congelados.png",

        ]);
        Categoria::create([
            'nombre'=>"Hogar",
            'imagen'=>"storage/img/hogar.jpg"
        ]);
        Categoria::create([
            'nombre'=>"Cosmética",
            'imagen'=>"storage/img/cosmetica.jpg"
        ]);
        Categoria::create([
            'nombre'=>"Perecederos",
            'imagen'=>"storage/img/perecedero.jpg"
        ]);
    }
}
