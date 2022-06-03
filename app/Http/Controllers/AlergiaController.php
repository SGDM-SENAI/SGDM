<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alergia;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class AlergiaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alergiacases = Alergia::all();
        return view('alergia.index', compact('alergiacases')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
        return view('alergia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome_alergia' => 'required|max:128',
            'tipo_alergia' => 'required|max:64',
        ]);

        try {

            $show = Alergia::create($validatedData);
            return redirect('/alergia/create')->with('success', 'alergia adicionada com sucesso!');
        } catch (QueryException $e) {
            $msg = "Esta alergia já está cadastrado. Por favor, informe uma alergia ainda não cadastrado!";
            return Redirect::back()->withErrors($msg);
        }
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
        //
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
        //
    }
}