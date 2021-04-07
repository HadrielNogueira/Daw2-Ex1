<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$carro = new Carro();
		$carros = Carro::All();
        return view("carro.index", [
			"carros" => $carros,
			"carro" => $carro
		]);
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
		if ($request->get("id") != ""){
			$carro = Carro::Find($request->get("id"));
		} else{
			$carro = new Carro();
		}
        
		$carro->marca = $request->get("marca");
		$carro->modelo = $request->get("modelo");
		$carro->placa = $request->get("placa");
		$carro->cor = $request->get("cor");
		$carro->fabricacao = $request->get("fabricacao");
		$carro->save();
		return redirect("/carro");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carro = Carro::Find($id);
		$carros = Carro::All();
		return view("carro.index", [
			"carros" => $carros,
			"carro" => $carro
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carro::Destroy($id);
		return redirect("/carro");
    }
}
