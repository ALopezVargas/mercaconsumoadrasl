<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $carrito=User::find(Auth::user()->id)->carritos;
            $precioTotal = 0;
            foreach ($carrito as $it) {
                $precioTotal += $it->cantidad*$it->producto->precio;
            }
            return view('productos.carrito',compact('carrito','precioTotal'));
        }catch(Exception $ex){
            return redirect()->route('inicio')->with('error','Tienes que ser un usuario para entrar al carrito.' . $ex->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
        $carrito =User::find(Auth::user()->id)->carrito;
        $data = $request->all();//Se recorre con un bucle xq es un array asociativo.
        array_shift($data);
       foreach ($data as $i) {
        //dd($i);
            $carrito = Carrito::find($i['id']);//Iteramos en cada carrito
            $carrito->cantidad = $i['cantidad'];
            $carrito->update();
       }
       return redirect()->back()->with('mensaje', "Actualizado Correctamente");
    }catch(Exception $ex){
        return redirect()->route('carrito.index')->with('mensaje',"Error al actualizar.".$ex->getMessage());
    }
    //    return view('productos.carrito',compact("carrito"))->with('mensaje', "Actualizado Correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        $carritos = User::find(Auth::user()->id)->carritos;//Sacar todos los carritos del user.
        foreach ($carritos as $carrito) {
           $carrito->delete();
        }
        return redirect()->route('inicio')->with('mensaje', "Compra finalizada.");

    }
    public function borrarElemento(Request $request , Carrito $id){

        $carritos = User::find(Auth::user()->id)->carritos;
        foreach ($carritos as $carrito) {
           $carrito->delete();
        }
        return redirect()->route('inicio')->with('mensaje', "Carrito borrado.");

    }
}
