<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Categoria;
use App\Models\Producto;

use Illuminate\Database\Migrations\Migration;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrador')->only([['edit', 'update', 'create', 'destroy', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ordenado = 'id';
        $ordenado2 = 'desc';

        $productos = Producto::where([
            ['nombre', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nombre', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy("nombre", "asc")
            ->paginate(8);

        return view('productos.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get(); //Creamos una variable que recoge todos los datos y los envía con GET .
        return view('productos.create', compact('categorias')); //Retorna la vista producto.create y además envía todos los datos de CATEGORIAS como un array .
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => ['required', 'min:5', 'max:20'],
            'descripcion' => ['required'],
            'categoria_id' => ['required'],
            'precio' => ['required', 'min:0.05'],
            'stock' => ['required', 'min:0']
        ]);

        try {
            $producto = new Producto();

            $producto->nombre = ucwords($request->nombre);
            $producto->descripcion = ucfirst($request->descripcion);
            $producto->categoria_id = $request->categoria_id;
            $producto->precio = $request->precio;
            $producto->oferta = $request->oferta;
            $producto->stock = $request->stock;

            if ($request->foto != null) {
                $request->validate([
                    'foto' => ['image']
                ]);

                $fileImagen = $request->file('foto');
                $nombreFoto = 'img/' . uniqid() . '_' . $fileImagen->getClientOriginalName();
                Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));

                $producto->foto = "storage/" . $nombreFoto;
            }

            $producto->save();

            return redirect()->route('producto.index')->with('mensaje', "Se ha creado Satisfactoriamente.");
        } catch (\Exception $ex) {
            return redirect()->route('producto.index')->with('error', "No se ha creado: " . $ex->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.detalle', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('productos.editar', compact('producto', 'categorias')); //retorna el producto del parametro y la variable categoria

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => ['required'],
            'descripcion' => ['required'],
            'categoria_id' => ['required'],
            'precio' => ['required'],
            'stock' => ['required', 'min:0']
        ]);

        try {
            $producto->update([
                'nombre' => ucwords($request->nombre),
                'descripcion' => ucfirst($request->descripcion),
                'categoria_id' => $request->categoria_id,
                'precio' => $request->precio,
                'oferta' => $request->oferta,
                'stock' => $request->stock
            ]);

            if ($request->has('foto')) {
                $request->validate([
                    'foto' => ['image']
                ]);

                if (basename($producto->foto) != 'default.jpg') {
                    unlink($producto->foto);
                }

                $fileImagen = $request->file('foto');
                $nombreFoto = "img/" . uniqid() . '' . $fileImagen->getClientOriginalName();
                Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));
                $producto->foto = "storage/" . $nombreFoto;

                $producto->update([
                    'foto' => 'storage/' . $nombreFoto
                ]);
            }

            return redirect()->route('producto.index')->with('mensaje', "Actualizado Correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('producto.index')->with('error', "Error al actualizar el producto. " . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        try {
            if ($producto->foto != null && $producto->foto != 'storage/img/default.jpg') {
                unlink($producto->foto);
            }
            $producto->delete();
            return redirect()->route('producto.index')->with('mensaje', "Se ha borrado correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('producto.index')->with('error', "No se ha borrado, hay un error." . $ex->getMessage());
        }
    }

    //-----------------------------
    //Funcion propia para ver cuantos productos tiene cada categoria
    public function mostrarProductos($producto_id)
    {

        $categoria = Categoria::find($producto_id);
        $nombreCategoria = $categoria->nombre;

        $productos = Producto::where('categoria_id', '=', $producto_id)->OrderBy('nombre')->paginate(5);
        return view('productos.mostrarProducto', compact('productos', 'nombreCategoria'));
    }
    public function aniadirCarrito(Request $request)
    {
        /*
        -Actualizar el carrito si ya está creado
        -Crear carrito.
        -Especificar que si no hay stock no se puede comprar.
        Cuando tu llamas al metodo de la rel , si tu llamas al metodo con () , te
        devuelve un array ,  una colección relacionada con el metodo
        hasmany/belongsto o lo que sea
        si lo pongo sin parentesis devuelve el objeto, no la relación.

        En las relaciones, si tienes un campo de la base de datos que se llama igual
        que el metodo, peta, porque como tu estas llamando al mismo nombre del objeto
        y uno es una variable y el otro una funcion, laravel se lia.

    Tabla pivot: relaciona 2 cosas, el carrito tiene varios productos del mismo user que
    son varias filas.
    Tabla aparte sin modelo ni nda, que solo tiene migracion, funcion attach , asignamos
    los id's , la tabla tendria producto_id y carrito_id .
    -> Tienes una tabla que relaciona los productos con los carritos, el resultado
    es que tengo todos los productos que quiera en los carritos que yo quiera.
    campos pivot: id / producto_id y carrito_id

    cada fila tiene su propio id , la relación la sacas de producto_id y carrito_id

    tutoriales pivot table
        */
        // if($request->Method('post')){
        //     $datos= $request->all();
        //     // echo "<pre>"; print_r($datos); die;

        //     //Ver si hay suficiente stock
        //     $getProductoStock = Producto::where(['producto_id'=>$datos['producto_id']])->first()->toArray();

        //     if($getProductoStock['stock']<$datos['cantidad']){
        //         return redirect()->back()->with('error', "La cantidad no está disponible..");
        //     }

        // }


        try {
            if(Auth::user()){
                $datos = $request ->all();
                $carrito = new Carrito();

                $carrito->producto_id = $datos['producto_id'];
                $carrito->user_id = Auth::user()->id;
                $carrito->cantidad= $datos['cantidad'];

                $carrito->save();
            }

            return redirect()->route('producto.index')->with('mensaje', "Producto añadido con éxito.");
        } catch (Exception $ex) {
            return redirect()->route('producto.index')->with('error', "No quedan productos.");
        }
    }


    public function ofertas(Request $request)
    {

        $productos = Producto::where([
            ['nombre', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nombre', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy("nombre", "asc")
            ->paginate(8);

        return view('ofertas.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
