<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=Categoria::orderby('nombre')->paginate(3);
        return view('categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
            'nombre'=>['required']
        ]);
    try{
        $categoria = new Categoria();

        $categoria ->nombre=ucwords($request->nombre);
        $categoria->save();

        if ($request->imagen!=null) {
            $request->validate([
                'imagen' => ['image']
            ]);
            $fileImagen = $request->file('imagen');
            $nombreFoto = 'img/' . uniqid() . '_' . $fileImagen->getClientOriginalName();
            Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));
            $categoria->imagen = "storage/" . $nombreFoto;
        }
            $categoria->save();

        return redirect()->route('categorias.index')->with('mensaje','Categoría creada.');

    }catch(\Exception $ex){
        return redirect()->route('categorias.index')->with('error','Categoria no creada'.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('categoria.detalle',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.editar',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request ->validate([
            'nombre' =>['required'],
        ]);

        try{
        $categoria->update([
            'nombre'=>ucwords($request->nombre)
        ]);

        //Si tiene imagen, validamos.
        if ($request->has('imagen')) {
            $request->validate([
                'imagen' => ['image']
            ]);
        //Si el nombre la foto del $categoria es distinta de 'default.jpg' , borramos la foto.
            if(basename($categoria->imagen)!='default.jpg'){
                unlink($categoria->imagen);
            }

            $fileImagen = $request->file('imagen');
            $nombreFoto = 'img/' . uniqid() . '_' . $fileImagen->getClientOriginalName();
            Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));

            $categoria->update([//Actualizamos la foto del categoria con la nueva foto subida
                'imagen'=>"storage/".$nombreFoto
            ]);
        }

            return redirect()->route('categorias.index')->with('mensaje','Categoría editada correctamente.');
        }catch(\Exception $ex){
            return redirect()->route('categorias.index')->with('error','No se ha podido editar.' .$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        try{
        $categoria->delete();

        return redirect()->route('categorias.index')->with('mensaje',"Se ha borrado con éxito.");
        }catch(\Exception $ex){
            return redirect()->route('categorias.index')->with('error',"No se ha podido borrar.".$ex->getMessage());
        }
    }
}
