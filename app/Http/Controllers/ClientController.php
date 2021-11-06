<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clients = Client::paginate(5);
        return view('client.index')->with('clients', $clients);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.form');
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
            'nombre'=>'required|max:15',
            'deuda'=>'required|gte:1',
            'comentario'=>'required'
        ]);
        $client = Client::create($request->only('nombre','deuda','comentario'));
        session::flash('mensaje','Registro creado satisfatoriamente');//crea un avarible de session para almacenar ese mensaje
        return redirect()->route('client.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.form')->with('client',$client); //PASAR DATOS ESA FUNCION
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nombre'=>'required|max:15',
            'deuda'=>'required|gte:1',
            'comentario'=>'required'
        ]);
        $client->nombre = $request['nombre'];
        $client->deuda = $request['deuda'];
        $client->comentario = $request['comentario'];
        $client->save();
        session::flash('mensaje','Registro editado satisfatoriamente');//crea un avarible de session para almacenar ese mensaje
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session::flash('mensaje','Registro eliminado con exito!');//crea un avarible de session para almacenar ese mensaje
        return redirect()->route('client.index');
    }
}
