<?php

namespace App\Http\Controllers;

use App\Models\telefone;
use App\Http\Requests\StoretelefoneRequest;
use App\Http\Requests\UpdatetelefoneRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('telefone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretelefoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretelefoneRequest $request)
    {
        //
        
        try{
            $show = Telefone::create($request['telefone']);
             return redirect('/telefone/create')->with('success', 'Escola adicionado com sucesso!');
        } catch (QueryException $e) {
            $msg = "Esta escola já está cadastrado. Por favor, informe uma escola ainda não cadastrado!";
            // return Redirect::back()->withErrors($msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show(telefone $telefone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function edit(telefone $telefone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetelefoneRequest  $request
     * @param  \App\Models\telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetelefoneRequest $request, telefone $telefone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(telefone $telefone)
    {
        //
    }
}
