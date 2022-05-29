<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Escola;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use DataTables;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $escolacases = Escola::all();
        return view('escola.index', compact('escolacases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('escola.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);



        $validatedData = $request->validate([
            'nome_escola' => 'required|max:50',
            'rede' => 'required|max:10',
        ]);

        try {

            $show = Escola::create($validatedData);
            return redirect('/escola/create')->with('success', 'Escola adicionado com sucesso!');
        } catch (QueryException $e) {
            $msg = "Esta escola já está cadastrado. Por favor, informe uma escola ainda não cadastrado!";
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
        $escolacases = Escola::all();
        return(compact('escolacases'));
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
        try {
            $escolacase = Escola::findOrFail($id);
            return view('escola.edit', compact('escolacase'));
        } catch (QueryException $e) {
            $msg = "Desculpe, ocorreu um problema interno. Por favor, contacte o administrador do sistema!";
            return Redirect::back()->withErrors($msg);
        }
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
        //dd($id);
        try {
            $validatedData = $request->validate([
                'nome_escola' => 'required|max:50',
                'rede' => 'required|max:10',
            ]);
            //dd($validatedData);
            Escola::where('id', $id)->update($validatedData);
            return redirect('/escola')->with('success', 'Dados da escola atualizado com sucesso!');
        } catch (QueryException $e) {
            //$msg = ($e->getMessage());
            $msg = "Desculpe, ocorreu um problema interno. O nome da escola deve conter no máximo 50 caracteres e a rede deve contrar no máximo 4 caracteres. 
                    Por favor, se o erro persistir contacte o administrador do sistema!";
            return Redirect::back()->withErrors($msg);
        }
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
        $escola = Escola::findOrFail($id);
        try {
            $escola->delete();
            return redirect('/escola')->with('success', 'Escola removido com sucesso!');
        } catch (QueryException $e) {
            //$msg = ($e->getMessage());
            $msg = "Existe aluno(s) cadastrado(s) nesta escola. Atualize o registro do(s) aluno(s), antes.";
            return Redirect::back()->withErrors($msg);
        }
    }
}
